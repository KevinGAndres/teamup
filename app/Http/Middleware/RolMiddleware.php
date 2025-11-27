<?php
public function handle($request, Closure $next, $rol)
{
    if (auth()->check()) {
        $user = auth()->user();

        // Si es usuario con tabla específica
        if ($rol == 'organizador' && $user instanceof \App\Models\Organizador) {
            return $next($request);
        }

        if ($rol == 'admin' && $user instanceof \App\Models\Administrador) {
            return $next($request);
        }

        if ($rol == 'user' && $user instanceof \App\Models\User) {
            return $next($request);
        }
    }

    return redirect()->route('login')->withErrors('No tienes permiso para acceder.');
}
