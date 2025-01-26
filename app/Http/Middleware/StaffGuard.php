<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffGuard
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('staffadmin')->check()) {
            return $next($request);
        }

        return redirect()->route('staff.login'); // Redirect jika tidak login
    }
}


