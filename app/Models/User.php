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
        'email',
        'telefono',
        'genero',
        'password'
        
    ];

    protected $hidden = [
        'password'
    ];

    public function getAuthPassword()
    {
        return $this->password;
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
