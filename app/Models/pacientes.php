<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'genero',
        'edad',
        'foto',
        'calle',
        'numero',
        'codigo_postal',
        'municipio',
        'telefono',
        'usuario',
        'correo',
        'contraseña',
        'rfc',
        'activo'
    ];
}
