<?php

namespace App\Http\View\Composers;

use App\Models\Cryptocurrency;
use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use illuminate\View\View;

class UserDataComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $website = Language::where('language_code', '!=', app()->getLocale())->limit(2)->get();
        $w_lang = Language::orderBy('language_name')->get();
        $lang = Language::where('language_code', '!=', app()->getLocale())->limit(2)->get();
        $f_lang = Language::orderBy('language_name')->get();
        $user = User::where('id', Auth::id())->first();
        $notification = $user->notifications;
        $unread = $user->unreadNotifications();
        $crypto = Cryptocurrency::all();
        $admin = User::where("email", "admin@admin.com")->first();
        $admin_notify = $admin->notifications;

        $view->with([
            'website' => $website,
            'w_lang' => $w_lang,
            'lang' => $lang,
            'f_lang' => $f_lang,
            'notification' => $notification,
            'unread' => $unread,
            'crypto' => $crypto,
            'admin_notify' => $admin_notify,
        ]);
    }
}
