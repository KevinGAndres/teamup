<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use App\Models\Organizador;

class LoginContoller extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        // Verifica si es un administrador
        if (Administrador::where('correo', $user->email)->exists()) {
            return redirect()->route('dashboard');
        }

        // Verifica si es un organizador
        if (Organizador::where('correo', $user->email)->exists()) {
            return redirect()->route('principal');
        }

        // Por defecto, jugador
        return redirect()->route('principal');
    }
}
