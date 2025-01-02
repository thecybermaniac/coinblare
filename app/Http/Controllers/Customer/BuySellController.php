<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cryptocurrency;
use App\Models\SaleOrder;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Admin\SellPublish as AdminSellPublish;
use App\Notifications\Customer\SellPublish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;
use Illuminate\Support\Str;

class BuySellController extends Controller
{

    protected $validationRules = [
        'amount_buy' => 'required',
    ];

    protected $paidRules = [
        'address' => 'required'
    ];

    public $rules;

    public $wallet;

    /* View for crypto selection */
    public function select()
    {
        $this->seo()->setTitle('Select Cryptocurrency');
        $crypto = Cryptocurrency::all();
        return view('customer.buy-sell.select', compact('crypto'));
    }

    /* Get selection checkbox value and store them in sessions and proceed */
    public function select_post()
    {
        $request = request()->all();
        $coin = explode("-", $request['tranx_coin']);
        request()->session()->put('crypto', $coin[0]);
        request()->session()->put('crypto_abbr', $coin[1]);
        return redirect()->route('customer.buy-sell');
    }

    /* Select payment method for crypto sell, store in session and proceed */
    public function sell_select(Request $request)
    {
        session()->put('sell_method', $request['sell_method']);

        return redirect()->route('customer.sell_view');
    }

    /* Declare rule for in-wallet crypto sell */
    public function __construct()
    {
        $this->wallet = Wallet::where(
            'user_id',
            Auth::id(),
        )->where('crypto_wallet', 'bitcoin')
            ->get();

        foreach ($this->wallet as $wallet) {
            session()->put('wallet', $wallet->balance_in_currency);
        }

        $this->rules = [
            'sell_amount' => ['required', function ($field, $value, $fail) {
                if (session()->get('sell_method') == "cryptobot") {
                    if ($value > session()->get('wallet')) {
                        $fail('Insuffienct Crypto Balance');
                    }
                }
            }],
            'sell_price' => 'required',
        ];
    }

    /* View for sell form */
    public function sell_view()
    {
        $this->seo()->setTitle('Sell ' . Str::ucfirst(request()->session()->get('crypto')));
        $validator = JsValidatorFacade::make($this->rules);
        return view('customer.buy-sell.sell', compact('validator'));
    }

    /* View for buy and sell */
    public function index()
    {
        $validator = JsValidatorFacade::make($this->validationRules);
        $user = Auth::user();
        $crypto = Wallet::where('crypto_wallet', request()->session()->get('crypto'))->first();
        $this->seo()->setTitle('Buy/Sell' . ' ' . Str::ucfirst(request()->session()->get('crypto')));
        return view('customer.buy-sell.index', compact(['user', 'validator', 'crypto']));
    }

    public function buy_coin(Request $request)
    {
        $validated = Validator::make($request->all(), $this->validationRules);

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
            request()->session()->put('amount', $request['amount_buy']);
            return Response::json([
                'status' => true,
                'redirect_url' => route('customer.list')
            ], 200);
        }
    }

    public function sell_coin(Request $request)
    {
        $validated = Validator::make($request->all(), $this->rules);

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
            if (session()->get('sell_method') == "external") {
                request()->session()->put('sell_amount', $request['sell_amount']);
                request()->session()->put('sell_price', $request['sell_price']);
                $route = 'customer.qr';
            } else {
                /* Get Prev Route Session */
                request()->session()->put('s-mzg', 'cryptobot');
                $crypto = Cryptocurrency::where('name', request()->session()->get('crypto'))->first();

                /* Save to Transaction History Table */
                $tranx = new TransactionHistory();
                $tranx->user_id = Auth::id();
                $tranx->crypto = request()->session()->get('crypto');
                $tranx->method = "sell";
                $tranx->amount = $request['sell_amount'];
                $tranx->price = $request['sell_price'];
                $tranx->abbr = $crypto->abbr;
                $tranx->status = "published";
                $tranx->save();

                $sell = new SaleOrder();
                $sell->user_id = Auth::id();
                $sell->tran_id = $tranx->id;
                $sell->amount = $request['sell_amount'];
                $sell->price = $request['sell_price'];
                $sell->crypto = request()->session()->get('crypto');
                $sell->address = "sold through wallet";
                $sell->abbr = request()->session()->get('crypto_abbr');
                $sell->status = "published";
                $sell->save();

                /* Minus from Cryptobot Wallet */
                $wallet = Wallet::where('user_id', Auth::id())->where('crypto_wallet', request()->session()->get('crypto'))->first();
                $wallet->balance_in_crypto = $wallet->balance_in_crypto - $request['sell_amount'];
                $wallet->balance_in_currency = $wallet->balance_in_currency - $request['sell_amount'] * $crypto->r_value;
                $wallet->save();

                /* Minus from user balance */
                $user = User::where('id', Auth::id())->first();
                $user->balance = $user->balance - $request['sell_amount'] * $crypto->r_value;
                $user->save();

                /* Send a notification to the user */
                $user->notify(new SellPublish($request));

                /* Redirect */
                $route = 'customer.buy-sell.success';
            }

            return Response::json([
                'status' => true,
                'redirect_url' => route($route)
            ], 200);
        }
    }

    public function qr()
    {
        $validator = JsValidatorFacade::make($this->paidRules);
        $crypto = Cryptocurrency::where('name', request()->session()->get('crypto'))->first();
        return view('customer.buy-sell.qr', compact(['crypto', 'validator']));
    }

    public function i_have_paid(Request $request)
    {
        $validated = Validator::make($request->all(), $this->paidRules);

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
            /* Get Prev Route Session */
            request()->session()->put('s-mzg', 'external');
            $crypto = Cryptocurrency::where('name', request()->session()->get('crypto'))->first();
            $user = Auth::user();

            /* Save to Transaction History Table */
            $tranx = new TransactionHistory();
            $tranx->user_id = Auth::id();
            $tranx->crypto = request()->session()->get('crypto');
            $tranx->method = "sell";
            $tranx->amount = request()->session()->get('sell_amount');
            $tranx->price = request()->session()->get('sell_price');
            $tranx->abbr = $crypto->abbr;
            $tranx->status = "pending";
            $tranx->save();

            /* Save to sale order table */
            $sell = new SaleOrder();
            $sell->user_id = Auth::id();
            $sell->tran_id = $tranx->id;
            $sell->amount = request()->session()->get('sell_amount');
            $sell->price = request()->session()->get('sell_price');
            $sell->crypto = request()->session()->get('crypto');
            $sell->address = $request['address'];
            $sell->abbr = request()->session()->get('crypto_abbr');
            $sell->status = "pending";
            $sell->save();

            Notification::send(User::find(6), new AdminSellPublish($sell, $user));

            return Response::json([
                'status' => true,
                'redirect_url' => route('customer.buy-sell.success')
            ], 200);
        }
    }

    public function success()
    {
        return view('customer.buy-sell.success');
    }
}
