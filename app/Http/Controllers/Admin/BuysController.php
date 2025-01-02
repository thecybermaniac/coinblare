<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;

class BuysController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Buys | Admin');
        $buy = TransactionHistory::where('method', 'buy')->get();
        $tranx = TransactionHistory::where('method', 'buy')->orderByDesc('id')->paginate(5);
        return view('admin.buys.index', compact(['tranx', 'buy']));
    }
}
