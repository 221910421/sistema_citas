<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    use HasFactory;

    protected $table = 'citas';

    protected $fillable = [
        'id_paciente',
        'id_doctor',
        'id_especialidad',
        'estatus_cita',
        'folio',
        'fecha_cita',
        'hora_cita',
        'id_consultorio',
    ];
}
