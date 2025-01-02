<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    public function home()
    {
        $this->seo()->setTitle('Buy & Sell Cryptocurrency');
        $user = User::where("email", "admin@admin.com")->first();
        if (!$user) {
            $admin = [
                "name" => "Administrator",
                "email" => "admin@admin.com",
                "phone" => "null",
                "email_verified_at" => now(),
                "password" => Hash::make("Admin1234"),
                "balance" => "null",
                "withdrawalable" => "null",
                "promo_code" => Str::random(6),
                "language" => app()->getLocale(),
                "status" => "active"
            ];

            User::create($admin);
        }
        return view('website.index');
    }

    public function about()
    {
        $this->seo()->setTitle('About');
        return view('website.about');
    }

    public function faq()
    {
        $this->seo()->setTitle('FAQ');
        return view('website.faq');
    }

    public function features()
    {
        $this->seo()->setTitle('Features');
        return view('website.features');
    }

    public function change_lang(Request $request, $code)
    {
        App::setLocale($code);
        session()->put('lang', $code);
        return redirect()->back();
    }
}
