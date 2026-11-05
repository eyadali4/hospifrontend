<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // جلب اللغة المحفوظة في الجلسة أو اعتماد الافتراضية
        $locale = Session::get('locale', config('app.locale', 'ar'));
        App::setLocale($locale);

        return $next($request);
    }
}