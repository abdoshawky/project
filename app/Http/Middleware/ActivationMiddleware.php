<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ActivationMiddleware
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
        if(Auth::user()->status == '0'){
            return json_response('please activate your account first', 401);
        }
        return $next($request);
    }
}
