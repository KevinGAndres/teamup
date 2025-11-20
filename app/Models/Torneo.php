<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table = 'torneos';

    protected $primaryKey = 'id_torneo';

    protected $fillable = [
        'nombre',
        'deporte',
        'cantidad_equipos',
        'formato',
        'lugar',
        'premios'
    ];
}
