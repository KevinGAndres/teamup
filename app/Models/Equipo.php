<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'creador_id',
        'nombre',
        'deporte',
        'correo',
        'genero',
        'lugar',
        'logo'
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }
}
