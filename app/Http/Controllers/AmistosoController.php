<?php

namespace App\Http\Controllers;

use App\Models\PartidoAmistoso;
use Illuminate\Http\Request;

class AmistosoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre_partido' => 'required',
            'equipo_local' => 'required',
            'equipo_visitante' => 'required',
            'fecha_partido' => 'required',
            'hora_partido' => 'required',
            'lugar_partido' => 'required'
        ]);

        PartidoAmistoso::create([
            'nombre_partido' => $request->nombre_partido,
            'equipo_local' => $request->equipo_local,
            'equipo_visitante' => $request->equipo_visitante,
            'fecha' => $request->fecha_partido,
            'hora' => $request->hora_partido,
            'lugar' => $request->lugar_partido,
            'comentarios' => $request->comentarios_partido
        ]);

        return back()->with('success', 'Amistoso guardado correctamente.');
    }
}
