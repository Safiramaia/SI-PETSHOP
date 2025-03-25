<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Redirect jika tidak punya akses
        return redirect('/login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
    }
}
