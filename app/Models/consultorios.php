<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultorios extends Model
{
    use HasFactory;

    protected $table = 'consultorios';

    protected $fillable = [
        'numero_de_consultorio',
        'id_especialidad',
        'id_estatus',
    ];
}
