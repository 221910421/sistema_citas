<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function verdatosuser()
    {
        $usuarios = pacientes::select('*')->where('id_pacientes','=',$id)->get();
    }
}
