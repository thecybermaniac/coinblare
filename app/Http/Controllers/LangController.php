<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LangController extends Controller
{
    public function changeLang(Request $request, $code)
    {
        App::setLocale($code);
        $user = User::where('id', Auth::id())->first();
        $user->language = $code;
        $user->save();
        return redirect()->back();
    }
}
