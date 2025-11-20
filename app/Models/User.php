<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'tipodoc',
        'documento',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'genero',
        'contrasena',
        'rol'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function jugador()
    {
        return $this->hasOne(Jugador::class, 'id_usuario');
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'creador_id');
    }
}
