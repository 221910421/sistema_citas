<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\citas_quiropractica;
use Models\pacientes;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    //----------------------------------------------Ver pacientes---------------------------------------//
    public function verusuarios()
    {
        $usuarios = DB::table('pacientes')->get();
        return view("templates.usuarios")
        ->with(['usuarios' => $usuarios]);
    }
}
