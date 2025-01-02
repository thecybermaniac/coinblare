<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MySalesController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('My Sales');
        $sales = SaleOrder::where('user_id', Auth::id())->orderByDesc('id')->paginate(5);
        return view('customer.my-sales.index', compact('sales'));
    }
}
