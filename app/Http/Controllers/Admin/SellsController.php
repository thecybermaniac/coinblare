<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cryptocurrency;
use App\Models\SaleOrder;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Notifications\Customer\SellPublished;
use App\Notifications\Customer\SellSold;
use Illuminate\Support\Facades\Auth;

class SellsController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Sells | Admin');
        $sale = SaleOrder::all();
        $tranx = SaleOrder::orderByDesc('id')->paginate(5);
        return view('admin.sells.index', compact(['tranx', 'sale']));
    }

    public function approve($id)
    {
        $sale = SaleOrder::find($id);
        $tranx = TransactionHistory::find($sale->tran_id);
        $crypto = Cryptocurrency::where('name', $sale->crypto)->first();


        $sale->status = 'published';
        $sale->save();
        $tranx->status = 'published';
        $tranx->save();

        /* Minus from user balance */
        $user = User::where('id', Auth::id())->first();
        $user->balance = $user->balance - $sale->amount * $crypto->r_value;
        $user->save();

        $user->notify(new SellPublished($sale));

        return redirect()->back();
    }

    public function buy($id)
    {
        $sale = SaleOrder::find($id);
        $tranx = TransactionHistory::find($sale->tran_id);

        $sale->status = 'sold';
        $sale->save();
        $tranx->status = 'sold';
        $tranx->save();

        $user  = User::where('id', $sale->user_id)->first();
        $user->withdrawalable = $user->withdrawalable  + $sale->price;
        $user->save();

        $user->notify(new  SellSold($sale));

        return redirect()->back();
    }
}
