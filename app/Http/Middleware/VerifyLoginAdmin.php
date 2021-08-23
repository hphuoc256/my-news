<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyLoginAdmin
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
        if(Auth::check()) {
            if(Auth::user()->level !== 0 && Auth::user()->status !== 0) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('getLogin');
            }
        } else {
            return redirect()->route('getLogin');
        }
    }
}
