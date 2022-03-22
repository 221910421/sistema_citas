<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultas extends Model
{
    use HasFactory;

    protected $table = 'consulta';

    protected $fillable = [
        'id_cita',
        'id_paciente',
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
