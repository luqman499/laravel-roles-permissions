<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if( !Auth::check() || auth()->user()->user_type != 2){
            return redirect()->route('login')->with('error','You are not authorized to access this page');
        }
        return $next($request);
    }
}
