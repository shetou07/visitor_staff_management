<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SecurityAuth
{
    public function handle($request, Closure $next, $guard = 'security')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('security.login');
        }

        return $next($request);
    }
}


