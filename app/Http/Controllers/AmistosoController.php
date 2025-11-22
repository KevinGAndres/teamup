<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amistoso;

class AmistosoController extends Controller
{
    public function index()
    {
        $amistosos = Amistoso::all();
        return view('amistosos.index', compact('amistosos'));
    }

    public function create()
    {
        return view('amistosos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_partido'  => 'required|string|max:255',
            'equipo_local'    => 'required|string|max:255',
            'equipo_visitante'=> 'required|string|max:255',
            'fecha'           => 'required|date',
            'hora'            => 'required',
            'lugar'           => 'required|string|max:255',
            'comentarios'     => 'nullable|string'
        ]);

        Amistoso::create([
            'nombre_partido'   => $request->nombre_partido,
            'equipo_local'     => $request->equipo_local,
            'equipo_visitante' => $request->equipo_visitante,
            'fecha'            => $request->fecha,
            'hora'             => $request->hora,
            'lugar'            => $request->lugar,
            'comentarios'      => $request->comentarios
        ]);

        return redirect()->route('amistosos.index')->with('success', 'Amistoso registrado correctamente.');
    }

    public function edit($id)
    {
        $amistoso = Amistoso::findOrFail($id);
        return view('amistosos.edit', compact('amistoso'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_partido'  => 'required|string|max:255',
            'equipo_local'    => 'required|string|max:255',
            'equipo_visitante'=> 'required|string|max:255',
            'fecha'           => 'required|date',
            'hora'            => 'required',
            'lugar'           => 'required|string|max:255',
            'comentarios'     => 'nullable|string'
        ]);

        $amistoso = Amistoso::findOrFail($id);
        $amistoso->update([
            'nombre_partido'   => $request->nombre_partido,
            'equipo_local'     => $request->equipo_local,
            'equipo_visitante' => $request->equipo_visitante,
            'fecha'            => $request->fecha,
            'hora'             => $request->hora,
            'lugar'            => $request->lugar,
            'comentarios'      => $request->comentarios
        ]);

        return redirect()->route('amistosos.index')->with('success', 'Amistoso actualizado correctamente.');
    }

    public function destroy($id)
    {
        $amistoso = Amistoso::findOrFail($id);
        $amistoso->delete();
        return redirect()->route('amistosos.index')->with('success', 'Amistoso eliminado correctamente.');
    }
}
