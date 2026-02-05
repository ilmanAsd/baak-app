<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            App::setLocale($locale);
            \Carbon\Carbon::setLocale($locale);
        } else {
            // Default to ID if not set
            App::setLocale('id');
            \Carbon\Carbon::setLocale('id');
        }

        return $next($request);
    }
}
