<?php
// app/Http/Middleware/CheckRole.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!in_array(Auth::user()->rol, $roles)) {
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
