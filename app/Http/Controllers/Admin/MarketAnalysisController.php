<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketAnalysisController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Market Analysis | Admin');
        return view('admin.market-analysis.index');
    }
}
