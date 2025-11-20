<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ==============================
    //  LOGIN
    // ==============================

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required'
        ]);

        $credentials = [
            'correo' => $request->correo,
            'password' => $request->contrasena
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('principal');
        } else {
            return back()->with('error', 'Correo o contraseña incorrectos.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }


    // ==============================
    //  REGISTRO GENERAL
    // ==============================

    public function viewRegistro()
    {
        return view('registro');
    }


    // ==============================
    //  REGISTRO DE USUARIO
    // ==============================

    public function viewRegistroUsuario()
    {
        return view('registro_usuario');
    }

    public function storeUsuario(Request $request)
    {
        $request->validate([
            'tipodoc' => 'required',
            'documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:users,correo',
            'telefono' => 'required',
            'genero' => 'required',
            'contrasena' => 'required|min:6|confirmed'
        ]);

        User::create([
            'tipodoc' => $request->tipodoc,
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'genero' => $request->genero,
            'password' => Hash::make($request->contrasena),
            'rol' => 'usuario'
        ]);

        return redirect()->route('registro.exitoso');
    }


    // ==============================
    //  REGISTRO ADMIN
    // ==============================

    public function viewRegistroAdmin()
    {
        return view('registro_admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'tipodoc' => 'required',
            'documento' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email|unique:users,correo',
            'telefono' => 'required',
            'contrasena' => 'required|min:6|confirmed'
        ]);

        User::create([
            'tipodoc' => $request->tipodoc,
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => '',
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'genero' => '',
            'password' => Hash::make($request->contrasena),
            'rol' => 'admin'
        ]);

        return redirect()->route('registro.exitoso');
    }
}
