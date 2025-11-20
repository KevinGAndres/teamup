<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class JugadorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->tipo === 'jugador') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Acceso no autorizado');
    }
}
