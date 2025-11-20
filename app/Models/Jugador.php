<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';

    protected $primaryKey = 'id_jugador';

    protected $fillable = [
        'id_usuario',
        'nombre',
        'edad',
        'correo',
        'deporte',
        'posicion',
        'genero',
        'telefono'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
