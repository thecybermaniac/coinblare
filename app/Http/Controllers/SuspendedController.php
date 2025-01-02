<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuspendedController extends Controller
{
    public function index(){
        $this->seo()->setTitle('Account Suspended');
        return view('customer.suspended.index');
    }
}
