<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cryptocurrency;
use App\Models\Currency;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Admin\Deposit;
use App\Notifications\Customer\FundDeposit;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave as Flutterwave;


class TranxController extends Controller
{
    // This returns the view for deposit form
    public function deposit()
    {
        $this->seo()->setTitle('Deposit');
        return view('customer.transactions.deposit');
    }

    // This processes the deposit form
    public function deposit_process(Request $request)
    {
        /* Get users local currency @s*/
        $ip = '41.242.79.255';
        $geoData = geoip($ip);
        $currency = $geoData['currency'];
        /* @e */

        /* Match user's local currency to database data
        and store the returned currency's exchange rate
        in a "rate" variable */
        $cun = Currency::where('code', $currency)->first();
        if (!is_null($cun)) {
            $rate = $cun->exchange_rate;
        }
        /* @e */

        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Set validation rules for the deposit form
        $rules = [
            'amount' => 'required',
        ];

        // Set custom messages for the validation errors
        $message = [
            'amount.required' => 'Please Enter An Amount'
        ];

        // Validate the form and store it in a "validated" variable
        $validated =  $request->validate($rules, $message);

        /* Flutterwave integration @s */
        // Enter the details of the payment for Flutterwave payment gateway
        $data = [
            'payment_options' => 'card',
            'amount' => $validated['amount'] * $rate,
            'email' => Auth::user()->email,
            'tx_ref' => $reference,
            'currency' => $currency,
            'redirect_url' => route('customer.deposit.verify'),
            'customer' => [
                'email' => Auth::user()->email,
                "phone_number" => Auth::user()?->phone,
                "name" => Auth::user()->name
            ],
        ];

        $payment = Flutterwave::initializePayment($data);
        /* @e */
        
        $request->session()->put('amount', $validated['amount']);

        return redirect($payment['data']['link']);
    }

    public function deposit_verify(Request $request)
    {
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);

            $user = User::where('id', Auth::id())->first();
            $user->withdrawalable = $user->withdrawalable + $request->session()->get('amount');
            $user->save();

            $rev = new Admin();
            $rev->total_revenue = $request->session()->get('amount');
            $rev->save();

            $user->notify(new FundDeposit($data, $user));
            Notification::send(new Deposit($data, $user));
        } elseif ($status ==  'cancelled') {
            return redirect()
                ->route('customer.dashboard')
                ->with('warning', 'Transaction has been cancelled, please try again later');
        } else {
            return redirect()
                ->route('customer.dashboard')
                ->with('danger', 'Transaction failed');
        }
        return redirect()->route('customer.dashboard');
    }

    public function withdrawal()
    {
        $this->seo()->setTitle('Withdrawal');
        return view('customer.transactions.withdrawal');
    }

    public function withdrawal_process(Request $request)
    {
        $rules = [
            'amount' => ['required', function ($field, $value, $fail) {
                if ($value < 1) {
                    $fail('Please Enter A Valid Amount');
                } elseif ($value > Auth::user()->withdrawalable) {
                    $fail('Insuffient Balance');
                }
            }],
            'paypal_id' => 'required|email',
            'password' => ['required', function ($field, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Incorrect Password');
                }
            }]
        ];

        $message = [
            'amount.required' => 'Please Enter An Amount',
            'paypal_id.required' => 'Please Enter Your Paypal ID',
            'paypal_id.email' => 'Invalid Paypal ID',
            'password.required' => 'Please Enter Your Password'
        ];

        $validated = $request->validate($rules, $message);
        $request->session()->put('amount', $validated['amount']);
        $request->session()->put('paypal_id', $validated['paypal_id']);

        if (Auth::user()->email == setting('restrict')) {
            return redirect()->route('customer.withdrawal.anti-fraud');
        } else {
            return redirect()->route('customer.server.error');
        }
    }

    public function withdraw_restrict()
    {
        $this->seo()->setTitle('Withdrawal Pending');
        return view('customer.transactions.withdraw-restrict');
    }

    public function withdraw_pay(Request $request)
    {
        $ip = '41.242.79.255';
        $geoData = geoip($ip);
        $currency = $geoData['currency'];

        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        $cun = Currency::where('code', $currency)->first();

        if (!is_null($cun)) {
            $rate = $cun->exchange_rate;
        }

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card',
            'amount' => 50 * $rate,
            'email' => Auth::user()->email,
            'tx_ref' => $reference,
            'currency' => $currency,
            'redirect_url' => route('customer.withdrawal.anti-fraud.success'),
            'customer' => [
                'email' => Auth::user()->email,
                "phone_number" => Auth::user()?->phone,
                "name" => Auth::user()->name
            ],
        ];

        $payment = Flutterwave::initializePayment($data);

        return redirect($payment['data']['link']);
    }


    public function withdraw_restrict_success()
    {
        $this->seo()->setTitle('Anti-fraud Payment Successful');

        $status = request()->status;

        if ($status = 'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            $user = User::where('id', Auth::id())->first();
            $user->withdrawalable = $user->withdrawalable + 50;
            $user->save();
        } elseif ($status ==  'cancelled') {
            return redirect()
                ->route('customer.dashboard')
                ->with('warning', 'Transaction has been cancelled, please try again later');
        } else {
            return redirect()
                ->route('customer.dashboard')
                ->with('danger', 'Transaction failed');
        }

        return view('customer.transactions.withdraw-restrict-success');
    }

    public function withdrawal_success()
    {
        $this->seo()->setTitle('Withdrawal Successful');
        return view('customer.transactions.withdrawal-success');
    }

    public function transfer()
    {
        $this->seo()->setTitle('Transfer Cryptos');
        $crypto = Cryptocurrency::all();
        return view('customer.transfer.index', compact(['crypto']));
    }

    public function transfer_process(Request $request)
    {
        $_rules = [
            'crypto' => 'required',
            'amount' => ['required', function ($field, $value, $fail) {
                $request = request()->all();
                $wallet = Wallet::where('user_id', Auth::id())->where('crypto_wallet', $request['crypto'])->first();
                if (!$wallet) {
                    $fail('No Available ' . Str::ucfirst($request['crypto']) . ' Wallet');
                } else {
                    if ($value <= 0) {
                        $fail('Please Enter A Valid Amount');
                    } elseif ($value > $wallet->balance_in_currency) {
                        $fail('Insufficient Balance');
                    }
                }
            }],
            'rec_crypto_id' => ['required', function ($field, $value, $fail) {
                $reciepient = User::where('email', $value)->first();
                if (!$reciepient) {
                    $fail('Invalid Cryptobot ID');
                } elseif ($reciepient->id == Auth::id()) {
                    $fail("You Can't Make A Transfer To Yourself");
                }
            }],
            'password' => ['required', function ($field, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Incorrect Password');
                }
            }]
        ];

        $message = [
            'crypto.required' => 'Select A Cryptocurrency To Transfer',
            'amount.required' => 'Enter The Transfer Amount In USD',
            'rec_crypto_id.required' => "Enter The Reciepient's ID",
            'password.required'  => 'Enter Your Password'
        ];

        $validated = Validator::make($request->all(), $_rules, $message);

        if ($validated->fails()) {
            return Response::json(
                array(
                    'status' => false,
                    'errors' => $validated->getMessageBag()->toArray()
                ),
                400
                //400 being the HTTP code for an invalid request.
            );
        }

        if ($validated->passes()) {
            $reciever = User::where('email', $request->rec_crypto_id)->first();
            $wallet = Wallet::where('user_id', $reciever->id)->where('crypto_wallet', $request->crypto)->first();
            if (is_null($wallet)) {
                $wallet = new Wallet();
                $crypto = Cryptocurrency::where('name', $request->crypto)->first();
                $wallet->user_id = $reciever->id;
                $wallet->wallet_symbol = 'icon ni ni-' . $request->crypto;
                $wallet->crypto_wallet = $request->crypto;
                $wallet->abbr = $crypto->abbr;
                $wallet->balance_in_crypto = $request->amount / $crypto->r_value;
                $wallet->balance_in_currency = $request->amount;
                $wallet->save();
                $user = User::where('id', $reciever->id)->first();
                $user->balance = $user->balance + $request->amount;
                $user->save();

                /* Save to Transaction History Table */
                $tranx = new TransactionHistory();
                $tranx->user_id = Auth::id();
                $tranx->tranx_type = "Transfer " . $request->crypto;
                $tranx->method = "transfer";
                $tranx->amount = $request->amount;
                $tranx->price = $request->amount / $crypto->r_value;
                $tranx->abbr = $crypto->abbr;
                $tranx->save();

                $request->session()->put('amount', $request->amount);
                $request->session()->put('reciever', $reciever->email);
                $request->session()->put('abbr', $crypto->abbr);
            } else {
                $crypto = Cryptocurrency::where('name', $request->crypto)->first();
                $wallet->balance_in_crypto = $wallet->balance_in_crypto + $request->amount / $crypto->r_value;
                $wallet->balance_in_currency =  $wallet->balance_in_currency + $request->amount;
                $wallet->save();
                $user = User::where('id', $reciever->id)->first();
                $user->balance = $user->balance + $request->amount;
                $user->save();

                /* Save to Transaction History Table */
                $tranx = new TransactionHistory();
                $tranx->user_id = Auth::id();
                $tranx->tranx_type = "Transfer " . $request->crypto;
                $tranx->method = "transfer";
                $tranx->amount = $request->amount;
                $tranx->price = $request->amount / $crypto->r_value;
                $tranx->abbr = $crypto->abbr;
                $tranx->save();

                $request->session()->put('amount', $request->amount);
                $request->session()->put('reciever', $reciever->email);
                $request->session()->put('abbr', $crypto->abbr);
            }
            return Response::json([
                'status' => true,
                'redirect_url' => route('customer.buy-sell.success')
            ], 200);
        }
    }

    public function  transfer_success()
    {
        $this->seo()->setTitle('Transfer Successful');
        return view('customer.transfer.success');
    }
}
