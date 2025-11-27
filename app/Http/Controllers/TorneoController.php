<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneo;

class TorneoController extends Controller
{
    public function index()
    {
return view('torneos_inicio');
    }

    public function inicio()
    {
        return $this->index();
    }

    public function buscar(Request $request)
    {
        $query = $request->get('query');

        $torneos = Torneo::when($query, function ($q) use ($query) {
            $q->where('nombre', 'like', "%{$query}%")
                ->orWhere('deporte', 'like', "%{$query}%")
                ->orWhere('lugar', 'like', "%{$query}%");
        })->get();

        return view('buscar_torneo', [
            'torneos' => $torneos,
            'query'   => $query,
        ]);
    }

    public function create()
    {
        return view('crear_torneo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreTorneo'    => 'required|string|max:255',
            'deporte'         => 'required|string|max:255',
            'cantidadEquipos' => 'required|integer|min:2',
            'lugar'           => 'required|string|max:255',
            'formato'         => 'nullable|string|max:255',
            'premios'         => 'nullable|string'
        ]);

        Torneo::create([
            'nombre'           => $request->input('nombreTorneo'),
            'deporte'          => $request->deporte,
            'cantidad_equipos' => $request->input('cantidadEquipos'),
            'formato'          => $request->formato,
            'lugar'            => $request->lugar,
            'premios'          => $request->premios
        ]);

         return redirect()->route('torneos_inicio')->with('success', 'Torneo creado correctamente.');
    }

    public function show($id)
    {
        $torneo = Torneo::findOrFail($id);

                    return view('crear_torneo', [
           'torneo' => $torneo,
        ]);
 
    }

    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneos.edit', compact('torneo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombreTorneo'     => 'sometimes|required|string|max:255',
            'deporte'          => 'required|string|max:255',
            'cantidadEquipos'  => 'required|integer|min:2',
            'lugar'            => 'required|string|max:255',
            'formato'          => 'nullable|string|max:255',
            'premios'          => 'nullable|string'
        ]);

        $torneo = Torneo::findOrFail($id);
        $torneo->update([
            'nombre'           => $request->input('nombreTorneo', $torneo->nombre),
            'deporte'          => $request->deporte,
            'cantidad_equipos' => $request->input('cantidadEquipos'),
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
