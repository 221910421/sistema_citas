<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consultorios;

class CitasController extends Controller
{
    public function consultorios_cita(Request $request){
        $id_especialidad = $request['id_especialidad'];
        $consultorios = consultorios::select('*')->where('id_especialidad','=',$id_especialidad)->where('estatus', '=', 'Activo')->get();
        return view('templates.citas.consultorios')
        ->with(["consultorios" => $consultorios]);
    }
}
