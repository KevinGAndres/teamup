<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuscarEquipo extends Model
{
    protected $table = 'buscar_equipo';

    protected $primaryKey = 'id_busqueda';

    public $timestamps = false;

    protected $fillable = [
        'id_jugador',
        'id_equipo',
        'fecha_solicitud',
        'estado',
        'mensaje'
    ];
}
