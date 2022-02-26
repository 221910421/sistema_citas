<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\citas;
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

    //----------------------------------------------Agregar nuevo usuario-----------------------------//
    public function nuevousuario(Request $request)
    {
<<<<<<< HEAD
      
    }

    //---------------------------------------------Ver citas------------------------------------------//
    public function vercitas()
    {
        $usuarios = DB::table('citas')->get();
        return view("templates.citas")
        ->with(['citas' => $citas]);
=======
        $correo = $request['correo'];
        $contraseña = $request['contraseña'];
        $confirmcontraseña = $request['confirmarcon'];
        if($contraseña = $confirmcontraseña){
        $emailexist = DB::select("SELECT * FROM pacientes  WHERE correo = '$correo'");
        if(count($emailexist) == 0){
            $pacientes = pacientes::create(array(
                'nombre' => strtoupper($request['nombre']),
                'apellido_paterno' => strtoupper($request['apellido_paterno']),
                'apellido_materno' => strtoupper($request['apellido_materno']),
                'genero' => $request['genero'],
                'edad' => $request['edad'],
                'calle' => strtoupper($request['calle']),
                'numero' => $request['numero'],
                'codigo_postal' =>$request['cp'],
                'municipio' => strtoupper($request['municipio']),
                'telefono' => $request['telefono'],
                'correo' => $request['correo'],
                'contraseña' => $request['contraseña'],
                'rfc' => $request['rfc'],
                'estatus' => $request['estatus']
            ));
            echo '<script language="javascript">alert("Usuario registrado exitosamente"); window.location.href="/usuarios";</script>';
        }else{
            echo'<script type="text/javascript">
                        alert("El usuario ya ha sido registrado anteriormente");
                        history.go(-1);
                        </script>';  
        }
      }else{
        echo'<script type="text/javascript">
                        alert("Las contraseñas deben ser iguales por favor verifique");
                        history.go(-1);
                        </script>';  
      }
>>>>>>> f30a892e269f690a80e47b0fbc6b95d7758205f6
    }
}

