<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('customer')){
            return redirect()->route('login.session');
        }

        return $next($request);
    }
}
