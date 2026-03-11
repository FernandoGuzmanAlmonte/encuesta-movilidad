<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('login')->withErrors(['credentials' => 'Debes iniciar sesión para acceder.']);
        }

        return $next($request);
    }
}