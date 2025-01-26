<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // Redirect ke halaman login sesuai guard
            if ($request->is('staff/*')) {
                return route('staff.login');
            }
            if ($request->is('peminjam/*')) {
                return route('peminjam.login');
            }
            return route('login'); // Default
        }
    }
}
