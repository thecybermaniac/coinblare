<?php

use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

function getRoute($route)
{
    if (request()->routeIs($route)) {
        return "active current-page";
    }
}

function lang($lang)
{
    $lange = Language::where('language_code', $lang)->first();
    return $lange->language_name;
}

function translate($word)
{
    return GoogleTranslate::trans($word, app()->getLocale());
}

function markAsRead()
{
    $user = User::where('id', Auth::id())->first();
    return $user->notifications->markAsRead();
}

function web_route($route)
{
    if (request()->routeIs($route)) {
        return "text-primary";
    }
}