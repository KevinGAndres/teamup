<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Facades\Auth;

class JugadorController extends Controller
{
    public function create()
    {
        return view('registro_jugador');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|numeric',
            'correo' => 'required|email',
            'deporte' => 'required',
            'posicion' => 'required',
            'genero' => 'required',
            'telefono' => 'required'
        ]);

        $usuarioId = Auth::id() ?? Auth::user()?->id_usuario;

        Jugador::create([
            'id_usuario' => $usuarioId,
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'correo' => $request->correo,
            'deporte' => $request->deporte,
            'posicion' => $request->posicion,
            'genero' => $request->genero,
            'telefono' => $request->telefono
        ]);

            return redirect()
            ->route('gestion_equipos')
            ->with('success', 'Registro exitoso.');
             }

    public function buscar()
    {
        $jugadores = Jugador::all();
        return view('buscar_jugador', compact('jugadores'));
    }
}
