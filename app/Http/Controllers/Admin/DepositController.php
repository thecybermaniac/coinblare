<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cryptocurrency;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Customer\CryptoDeposit;
use App\Notifications\Customer\CryptoDepositCancel;
use App\Notifications\Customer\CryptoDepositDecline;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Deposits | Admin');
        $dep = Deposit::all();
        $deposit = Deposit::orderByDesc('id')->paginate(5);
        return view('admin.deposit.index', compact(['deposit', 'dep']));
    }

    public function detail($id)
    {
        $this->seo()->setTitle('Deposit Details | Admin');
        $deposit = Deposit::find($id);
        return view('admin.deposit.detail', compact('deposit'));
    }

    public function approve($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 'approved';
        $deposit->save();

        $crypto = Cryptocurrency::where('name', $deposit->crypto)->first();

        $wallet = Wallet::where('user_id', $deposit->user_id)->where('crypto_wallet', $deposit->crypto)->get();
        foreach ($wallet as $w) {
            $w->balance_in_crypto = $w->balance_in_crypto + $deposit->amount;
            $w->balance_in_currency = $w->balance_in_currency + $deposit->amount * $crypto->r_value;
            $w->save();
        }

        $user = User::find($deposit->user_id);
        $user->balance = $user->balance + $deposit->amount * $crypto->r_value;
        $user->save();

        $user->notify(new CryptoDeposit($deposit));

        return redirect()->back();
    }

    public function cancel_approval($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 'pending';
        $deposit->save();

        $crypto = Cryptocurrency::where('name', $deposit->crypto)->first();

        $wallet = Wallet::where('user_id', $deposit->user_id)->where('crypto_wallet', $deposit->crypto)->get();
        foreach ($wallet as $w) {
            $w->balance_in_crypto = $w->balance_in_crypto - $deposit->amount;
            $w->balance_in_currency = $w->balance_in_currency - $deposit->amount * $crypto->r_value;
            $w->save();
        }

        $user = User::find($deposit->user_id);
        $user->balance = $user->balance - $deposit->amount * $crypto->r_value;
        $user->save();

        $user->notify(new CryptoDepositCancel($deposit));

        return redirect()->back();
    }

    public function decline($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 'declined';
        $deposit->save();

        $user = User::find($deposit->user_id);
        $user->notify(new CryptoDepositDecline($deposit));


        return redirect()->back();
    }
}
