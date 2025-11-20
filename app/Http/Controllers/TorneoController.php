<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function create()
    {
        return view('crear_torneo');
    }

    public function store(Request $request)
    {
        Torneo::create([
            'nombre' => $request->nombreTorneo,
            'deporte' => $request->deporte,
            'cantidad_equipos' => $request->cantidadEquipos,
            'formato' => $request->formato,
            'lugar' => $request->lugar,
            'premios' => $request->premios
        ]);

        return back()->with('success', 'Torneo registrado correctamente.');
    }

    public function buscar()
    {
        $torneos = Torneo::all();
        return view('buscar_torneo', compact('torneos'));
    }

    public function index()
    {
        // Aquí puedes retornar una vista de inicio de torneos
        return view('torneos_inicio');
    }
}
