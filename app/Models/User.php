<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'tipodoc',
        'documento',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'genero',
        'password',
        'rol'
    ];

    protected $hidden = [
        'password'
    ];



    public function getAuthIdentifierName()
    {
        return array_key_exists('id', $this->attributes) ? 'id' : 'id_usuario';
    }

    public function getAuthIdentifier()
    {
        $key = $this->getAuthIdentifierName();
        return $this->getAttribute($key);
    }

    public function getIdUsuarioAttribute(): ?int
    {
        return $this->attributes['id_usuario'] ?? $this->attributes['id'] ?? null;
    }
    
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
    public function isAdmin()
{
    return $this->rol === 'admin';
}

public function isOrganizador()
{
    return $this->rol === 'organizador';
}

public function isJugador()
{
    return $this->rol === 'jugador';
}

}
