<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;

    protected $table = 'organizadores';

    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'genero',
        'contrasena',
    ];

    public $timestamps = true;
}
