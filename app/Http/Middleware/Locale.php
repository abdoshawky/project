<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = session()->has('lang') ? session()->get('lang') : 'ar';
        App::setlocale($lang);
//        dd(App::getLocale());
        return $next($request);
    }
}
