<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrearEquipo extends Model
{
    protected $table = 'crear_equipo';

    protected $fillable = [
        'id_usuario',
        'nombre_equipo',
        'deporte',
        'integrantes',
        'correo',
        'genero',
        'telefono',
        'lugar'
    ];
}
