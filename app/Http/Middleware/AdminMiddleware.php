<?php

namespace App\Http\Middleware;


use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if( !Auth::check() || auth()->user()->user_type != 1) {
//            abort(401);
//            throw new NotFoundHttpException('User does not have the right permissions.');
            return redirect()->route('welcome')->with('error','You are not authorized to access this page');
        }
        return $next($request);
    }
}
