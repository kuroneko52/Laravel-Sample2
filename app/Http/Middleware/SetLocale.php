<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use App\Http\Controller\LocaleController;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // セッションからロケールを取得し、デフォルト値を設定
        $locale = session('app_locale', config('app.locale'));

        // アプリケーションのロケールを設定
        App::setLocale($locale);

        return $next($request);
    }
}
