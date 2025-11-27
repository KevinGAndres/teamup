<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function create()
    {
        return view('registro_admin');
    }

    public function store(Request $request)
    {

        $request->validate([
            'tipo_documento'       => 'required',
            'documento'     => 'required|unique:administradores,documento',
            'nombre'        => 'required|string|max:255',
            'apellido'      => 'required|string|max:255',
            'correo'        => 'required|email|unique:administradores,correo',
            'telefono'      => 'required',
            'genero'        => 'required',
            'contrasena'    => 'required|min:6|confirmed',
        ]);

        Administrador::create([
    'tipo_documento' => $request->tipo_documento,
    'documento'      => $request->documento,
    'nombre'         => $request->nombre,
    'apellido'       => $request->apellido,
    'correo'         => $request->correo,
    'telefono'       => $request->telefono,
    'genero'         => $request->genero,
    'contrasena'     => Hash::make($request->contrasena),
    'rol'            => 'admin'

]);

        return redirect()->route('registro_exitoso') ->with('success', 'Administrador registrado correctamente.');
    }
}
