<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('unirme_equipo', compact('equipos'));
    }

    public function show($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('unirme_equipo', [
            'equipos' => collect([$equipo]),
        ]);
    }

    public function unirme()
    {
        $equipos = Equipo::all();

        return view('unirme_equipo', compact('equipos'));
    }

    public function create()
    {
         return view('crear_equipo');
    }

    public function store(Request $request)
    {
        $creadorId = Auth::id();

        $request->validate([
            'nombre'      => 'required|string|max:255',
            'deporte'     => 'required|string|max:255',
            'integrantes' => 'required|integer|min:1',
            'correo'      => 'required|email|max:255',
            'genero'      => 'required|string|max:50',
            'lugar'       => 'required|string|max:255',
            'logo'        => 'nullable|image'
        ]);

        $logo = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('equipos', 'public');
          }

        Equipo::create([
            'creador_id'      => $creadorId,
            'nombre'           => $request->nombre,
            'deporte'          => $request->deporte,
            'integrantes'      => $request->integrantes,
            'correo'           => $request->correo,
            'genero'           => $request->genero,
            'lugar'            => $request->lugar,
            'logo'             => $logo
        ]);

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('crear_equipo', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);

        $request->validate([
            'nombre'      => 'required|string|max:255',
            'deporte'     => 'required|string|max:255',
            'integrantes' => 'required|integer|min:1',
            'correo'      => 'required|email|max:255',
            'genero'      => 'required|string|max:50',
            'lugar'       => 'required|string|max:255',
             'logo'        => 'nullable|image'
        ]);

        if ($request->hasFile('foto')) {
            $equipo->logo = $request->file('foto')->store('equipos', 'public');
        }

        $equipo->update([
            'nombre'      => $request->nombre,
            'deporte'     => $request->deporte,
            'integrantes' => $request->integrantes,
            'correo'      => $request->correo,
            'genero'      => $request->genero,
            'lugar'       => $request->lugar
        ]);

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }

    public function solicitud($id)
     {
        if (Auth::user()?->rol !== 'jugador') {
            return redirect()->back()->with('error', 'Solo los jugadores pueden enviar solicitudes.');
        }
        return back()->with('success', 'Solicitud enviada correctamente.');
    
 }
   }
