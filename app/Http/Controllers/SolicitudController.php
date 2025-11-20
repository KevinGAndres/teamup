<?php

namespace App\Http\Controllers;

use App\Models\SolicitudEquipo;
use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SolicitudController extends Controller
{
    public function enviar($id_equipo)
    {
        $equipo = Equipo::findOrFail($id_equipo);

        SolicitudEquipo::create([
            'id_equipo' => $id_equipo,
            'id_usuario' => Auth::user()->id_usuario,
            'estado' => 'pendiente'
        ]);

        Mail::raw("Un jugador ha solicitado unirse a tu equipo: $equipo->nombre", function($msg) use ($equipo) {
            $msg->to($equipo->correo)
                ->subject("📩 Nueva Solicitud de Unión - TeamUp");
        });

        return back()->with('success', 'Solicitud enviada correctamente.');
    }
}
