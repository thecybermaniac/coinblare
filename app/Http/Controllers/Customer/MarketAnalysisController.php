<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketAnalysisController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Market Analysis');
        return view('customer.market-analysis.index');
    }
}
