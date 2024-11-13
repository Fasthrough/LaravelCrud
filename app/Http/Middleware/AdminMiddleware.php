<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if admmin
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request);
        }
            //not admin
        return redirect('/'); 
    }
}