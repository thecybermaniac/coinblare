<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;

class TranxController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Transactions | Admin');
        $tran = TransactionHistory::all();
        $tranx = TransactionHistory::orderByDesc('id')->paginate(5);
        return view('admin.transactions.index', compact(['tranx', 'tran']));
    }
}
