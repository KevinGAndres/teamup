<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerificarRol
{
    public function handle($request, Closure $next, ...$roles)
    {
        $usuario = Auth::user();

        if ($usuario && in_array($usuario->rol, $roles)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'No tienes permiso para acceder.');
    }
}
