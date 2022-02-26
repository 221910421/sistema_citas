<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctores extends Model
{
    use HasFactory;

    protected $table = 'doctores';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'genero',
        'edad',
        'foto',
        'cedula',
        'correo',
        'contraseña',
        'estatus',
    ];
}
