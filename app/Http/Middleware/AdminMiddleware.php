<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->user_type !== 'admin') {
            abort(403, 'Unauthorized - Admin access only');
        }

        return $next($request);
    }
}
