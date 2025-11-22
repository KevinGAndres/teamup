<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneo;

class TorneoController extends Controller
{
    public function index()
    {
        $torneos = Torneo::all();
        return view('torneos.index', compact('torneos'));
    }

    public function create()
    {
        return view('torneos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'         => 'required|string|max:255',
            'deporte'        => 'required|string|max:255',
            'cantidad_equipos'=> 'required|integer|min:2',
            'lugar'          => 'required|string|max:255',
            'formato'        => 'nullable|string|max:255',
            'premios'        => 'nullable|string'
        ]);

        Torneo::create([
            'nombre'           => $request->nombre,
            'deporte'          => $request->deporte,
            'cantidad_equipos' => $request->cantidad_equipos,
            'formato'          => $request->formato,
            'lugar'            => $request->lugar,
            'premios'          => $request->premios
        ]);

        return redirect()->route('torneos.index')->with('success', 'Torneo creado correctamente.');
    }

    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneos.edit', compact('torneo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'deporte'          => 'required|string|max:255',
            'cantidad_equipos' => 'required|integer|min:2',
            'lugar'            => 'required|string|max:255',
            'formato'          => 'nullable|string|max:255',
            'premios'          => 'nullable|string'
        ]);

        $torneo = Torneo::findOrFail($id);
        $torneo->update([
            'nombre'           => $request->nombre,
            'deporte'          => $request->deporte,
            'cantidad_equipos' => $request->cantidad_equipos,
            'formato'          => $request->formato,
            'lugar'            => $request->lugar,
            'premios'          => $request->premios
        ]);

        return redirect()->route('torneos.index')->with('success', 'Torneo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->delete();
        return redirect()->route('torneos.index')->with('success', 'Torneo eliminado correctamente.');
    }
}
