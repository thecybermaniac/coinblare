<?php

namespace App\Http\View\Composers;

use App\Models\Cryptocurrency;
use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use illuminate\View\View;

class WebsiteComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $website = Language::where('language_code', '!=', app()->getLocale())->limit(2)->get();
        $w_lang = Language::orderBy('language_name')->get();
        $auth = Language::where('language_code', app()->getLocale())->first();

        $view->with([
            'website' => $website,
            'w_lang' => $w_lang,
            'auth' => $auth,
        ]);
    }
}