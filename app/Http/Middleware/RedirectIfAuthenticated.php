<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Controleer of de gebruiker de rol 'admin' heeft (rol_id 1)
            if (Auth::user()->role_id == 1) {
                return redirect('/dashboard'); // Redirect naar het admin-dashboard
            } else {
                return redirect('/home'); // Redirect naar het standaarddashboard voor andere gebruikers
            }
        }

        return $next($request);
    }
}
