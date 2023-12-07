<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateTicketOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check of de gebruiker is ingelogd
        if (!auth()->check()) {
            return redirect()->route('login'); // Stuur niet-ingelogde gebruikers naar de loginpagina
        }

        return $next($request);
    }
}
