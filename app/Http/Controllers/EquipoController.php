<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function create()
    {
        return view('crear_equipo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'deporte' => 'required',
            'integrantes' => 'required',
            'correo' => 'required|email',
            'genero' => 'required',
            'lugar' => 'required',
            'logo' => 'nullable|image'
        ]);

        $logo = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('equipos', 'public');
        }

        Equipo::create([
            'nombre' => $request->nombre,
            'deporte' => $request->deporte,
            'integrantes' => $request->integrantes,
            'correo' => $request->correo,
            'genero' => $request->genero,
            'lugar' => $request->lugar,
            'logo' => $logo
        ]);

        return back()->with('success', 'Equipo creado exitosamente.');
    }

    public function unirmeLista()
    {
        $equipos = Equipo::all();
        return view('unirme_equipo', compact('equipos'));
    }
}
