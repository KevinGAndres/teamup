<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartidoAmistoso extends Model
{
    protected $table = 'amistosos';

    protected $primaryKey = 'id_amistoso';

    protected $fillable = [
        'nombre_partido',
        'equipo_local',
        'equipo_visitante',
        'fecha',
        'hora',
        'lugar',
        'comentarios'
    ];
}
