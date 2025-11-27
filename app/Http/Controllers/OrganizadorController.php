<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;
use Illuminate\Support\Facades\Hash;

class OrganizadorController extends Controller
{
    public function create()
    {
        return view('registro_organizador');
    }

public function store(Request $request)
{
    $request->validate([
        'tipodoc' => 'required',
        'documento' => 'required',
        'nombre' => 'required',
        'apellido' => 'required',
        'correo' => 'required|email|unique:organizadores,correo',
        'telefono' => 'required',
        'genero' => 'required',
        'contrasena' => 'required|min:6|confirmed',
    ]);

    Organizador::create([
        'tipo_documento' => $request->tipodoc,
        'documento'      => $request->documento,
        'nombre'         => $request->nombre,
        'apellido'       => $request->apellido,
        'correo'         => $request->correo,
        'telefono'       => $request->telefono,
        'genero'         => $request->genero,
        'contrasena'     => Hash::make($request->contrasena),
        'rol'            => 'organizador'
    ]);

    return redirect()->route('registro_exitoso')->with('success', 'Organizador registrado correctamente.');
}

}
