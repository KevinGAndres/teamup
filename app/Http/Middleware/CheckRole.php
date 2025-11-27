<?php
public function handle($request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();
    if (!in_array($user->rol, $roles)) {
        return redirect()->back()->with('error', 'No tienes permiso para acceder.');
    }

    return $next($request);
}
