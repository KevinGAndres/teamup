<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Aquí puedes cargar datos para mostrar en el dashboard
        $usuariosCount    = \App\Models\User::count();
        $torneosCount     = \App\Models\Torneo::count();
        $equiposCount     = \App\Models\Equipo::count();
        $amistososCount   = \App\Models\Amistoso::count();

        return view('admin.dashboard', compact(
            'usuariosCount',
            'torneosCount',
            'equiposCount',
            'amistososCount'
        ));
    }
}
