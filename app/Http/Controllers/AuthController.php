<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function showLoginForm()
        {
        return view('login');
        }

        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
$rol = Auth::user()->rol;

if ($rol === 'admin') {
    return redirect()->route('admin.dashboard');
} elseif ($rol === 'organizador') {
    return redirect()->route('principal');
} elseif ($rol === 'usuario') {
    return redirect()->route('principal');
} else {
    Auth::logout();
    return redirect()->route('login')->with('error', 'Rol no reconocido.');
}
    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ]);
    

     }

        

public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 return redirect()->route('login');
    }

//_//
    public function viewRegistro()
    {
        return view('registro');
    }


    // ==============================
    //  REGISTRO DE USUARIO
    // ==============================

    
    public function viewRegistroUsuario()
    {
        return view('registro_usuarios');
    }

    

    public function storeUsuario(Request $request)
    {
        $request->validate([
            'tipodoc' => 'required',
            'documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:users,email',
            'telefono' => 'required',
            'genero' => 'required',
            'contrasena' => 'required|min:6|confirmed'
        ]);


    
        User::create([
             'tipodoc' => $request->tipodoc,
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'genero' => $request->genero,
            'password' => Hash::make($request->contrasena),
        ]);

        return redirect()->route('registro_exitoso')->with('success', 'Usuario registrado correctamente.');
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
            'correo' => 'required|email|unique:users,email',
            'telefono' => 'required',
            'contrasena' => 'required|min:6|confirmed'
        ]);

        User::create([
            'tipodoc' => $request->tipodoc,
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => '',
            'email' => $request->correo,
            'telefono' => $request->telefono,
            'genero' => '',
            'password' => Hash::make($request->contrasena),
            'rol' => 'admin'
        ]);

        return redirect()->route('registro_exitoso');

    }

    
}
