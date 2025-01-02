<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Customer\AccountReactive;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Customers | Admin');
        $customers = User::where("email", "!=", "admin@admin.com")->get();
        $customer = User::where("email", "!=", "admin@admin.com")->orderByDesc('id')->paginate(5);
        return view('admin.customers.index', compact(['customer', 'customers']));
    }

    public function detail($id)
    {
        $this->seo()->setTitle('Customer Detail | Admin');
        $user =  User::find($id);
        $wallet = Wallet::where('user_id', $user->id)->get();
        $tranx = TransactionHistory::where('user_id', $user->id)->get();
        return view('admin.customers.detail', compact(['user', 'wallet', 'tranx']));
    }

    public function suspend($id)
    {
        $user = User::find($id);
        $user->status = 'suspended';
        $user->save();

        return redirect()->back();
    }

    public function reactive($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();

        $user->notify(new AccountReactive($user));

        return redirect()->back();
    }
}
