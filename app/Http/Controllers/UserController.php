<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacientes;
use \Crypt;

class UserController extends Controller
{
    public function verdatosuser()
    {
        $mis_datos = pacientes::select('*')->where('id_pacientes','=',session('session_id'))->get();
        foreach($mis_datos as $password){
            $contraseña = Crypt::decrypt($password->contraseña);
            $rfc = Crypt::decrypt($password->rfc);
        }
        return view('templates.mis_datos')
        ->with(["mis_datos" => $mis_datos])
        ->with(["rfc" => $rfc])
        ->with(['contraseña' => $contraseña]);
    }
}
