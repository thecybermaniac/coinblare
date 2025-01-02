<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cryptocurrency;
use App\Models\Marketplace;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Customer\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MarketplaceController extends Controller
{
    public function list()
    {
        $this->seo()->setTitle('Buy ' . Str::ucfirst(request()->session()->get('crypto')));
        $crypto = Cryptocurrency::where('name', request()->session()->get('crypto'))->first();
        $price = request()->session()->get('amount') / $crypto->r_value;
        request()->session()->put('price', $price);
        request()->session()->put('abbr', $crypto->abbr);
        request()->session()->put('r_value', $crypto->r_value);
        request()->session()->put('crypto_wallet', $crypto->name);
        return view('customer.marketplace.list', compact(['price', 'crypto']));
    }

    public function payment(Request $request)
    {
        /* Return error if amount excess user balance */
        if (request()->session()->get('amount') > Auth::user()->withdrawalable) {
            return redirect()->back()->with('error', 'Insufficient Balance');
        } else {
            $wallet = Wallet::where('user_id', Auth::id())->where('crypto_wallet', request()->session()->get('crypto_wallet'))->first();
            $user = User::where('id', Auth::id())->first();
            $crypto = Cryptocurrency::where('name', request()->session()->get('crypto'))->first();

            /* Save to Transaction History Table */
            $tranx = new TransactionHistory();
            $tranx->user_id = Auth::id();
            $tranx->crypto = request()->session()->get('crypto');
            $tranx->method = "Buy";
            $tranx->amount = request()->session()->get('price');
            $tranx->price = request()->session()->get('amount');
            $tranx->abbr = request()->session()->get('abbr');
            $tranx->status = 'successful';
            $tranx->save();


            if (is_null($wallet)) {
                /* Create new wallet if there is no existing one */
                $wallet = new Wallet();
                $wallet->user_id = Auth::id();
                $wallet->wallet_symbol = $crypto->crypto_img;
                $wallet->crypto_wallet = request()->session()->get('crypto_wallet');
                $wallet->abbr = request()->session()->get('abbr');
                $wallet->balance_in_crypto = request()->session()->get('price');
                $wallet->balance_in_currency = request()->session()->get('price') * $crypto->r_value;
                $user->balance = $user->balance + request()->session()->get('price') * $crypto->r_value;
                $user->withdrawalable = $user->withdrawalable - request()->session()->get('amount');
                $wallet->save();
                $user->save();
            } else {
                /* Else update the existing wallet */
                $wallet->balance_in_crypto = $wallet->balance_in_crypto + request()->session()->get('price');
                $wallet->balance_in_currency = $wallet->balance_in_currency + request()->session()->get('price') * $crypto->r_value;
                $user->balance = $user->balance + request()->session()->get('price') * $crypto->r_value;
                $user->withdrawalable = $user->withdrawalable - request()->session()->get('amount');
                $wallet->save();
                $user->save();
            }

            /* Send a success notification to the user*/
            $price = request()->session()->get('amount');
            $qty = request()->session()->get('price');
            $abbr = request()->session()->get('abbr');
            $user->notify(new Buy([$price, $qty, $abbr]));

            /* Redirect */
            request()->session()->put('s-mzg', 'buy');
            return redirect()->route('customer.buy-sell.success');
        }
    }
}
