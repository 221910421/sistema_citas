<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consultorios;


class CitasController extends Controller
{
    public function consultorios_cita(Request $request){
        $id_especialidad = $request['id_especialidad'];
        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        $next_date = date('Y-m-d', strtotime($date .' +1 day'));
        $consultorios = consultorios::select('*')->where('id_especialidad','=',$id_especialidad)->where('estatus', '=', 'Activo')->get();
        return view('templates.citas.consultorios')
        ->with(["consultorios" => $consultorios])
        ->with(['next_date' => $next_date]);
    }
}
