<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudEquipo extends Model
{
    protected $table = 'solicitudes_equipo';

    protected $primaryKey = 'id_solicitud';

    protected $fillable = [
        'id_equipo',
        'id_usuario',
        'estado'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
