<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultas extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'id_cita',
        'nombre_paciente',
        'apellido_paterno_paciente',
        'apellido_materno_paciente',
        'estatura',
        'peso',
        'temperatura',
        'alergias',
        'sintomas',
        'diagnostico',
        'medicamentos_recetados',
        'observaciones',

    ];
}
