<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\citas;
use App\Models\pacientes;
use Illuminate\Support\Facades\DB;
use \Crypt;//---->Se llama a la librería que nos permite encriptar las fotografías y contraseñas.

class SystemController extends Controller
{
    //----------------------------------------------Ver pacientes---------------------------------------//
    public function verusuarios()
    {
        return view("templates.usuarios");
    }

    //----------------------------------------------Actualizar tabla usuarios--------------------------//
    public function actualizartablausuarios()
    {
        $usuarios = pacientes::all();
        return view('templates-tables-data.table-data-usu')
        ->with(['usuarios' => $usuarios]);
    }

    //----------------------------------------------Ver detalles usuario------------------------------//
    public function detallesusu(Request $request)
    {
        $id = $request['id'];
        $usuarios = pacientes::select('*')->where('id_pacientes','=',$id)->get();
        return view('templates.detalles-usu')
        ->with(['usuarios' => $usuarios]);
    }

    //----------------------------------------------Agregar nuevo usuario-----------------------------//
    public function nuevousuario(Request $request)
    {
        $correo = $request['correo'];
        $contraseña = $request['contraseña'];
        $confirmcontraseña = $request['confirmarcon'];
        if($request->file('foto') != ''){
            $file = $request->file('foto');

            $foto =$file->getClientOriginalName(); 

            $date = date('Ymd_His_');
                $foto2 =  $date . $foto;

            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 = "shadow.png";
        }
        if($contraseña = $confirmcontraseña){
        $emailexist = DB::select("SELECT * FROM pacientes  WHERE correo = '$correo'");
        if(count($emailexist) == 0){
            $paciente = pacientes::create(array(
                'nombre' => strtoupper($request['nombre']),
                'apellido_paterno' => strtoupper($request['apellido_paterno']),
                'apellido_materno' => strtoupper($request['apellido_materno']),
                'genero' => $request['genero'],
                'foto' => $foto2,
                'edad' => $request['edad'],
                'calle' => strtoupper($request['calle']),
                'numero' => $request['numero'],
                'codigo_postal' =>$request['cp'],
                'municipio' => strtoupper($request['municipio']),
                'telefono' => $request['telefono'],
                'correo' => $request['correo'],
                'contraseña' => $request['contraseña'],
                'rfc' =>  $request['rfc'],
                'estatus' => $request['estatus']
            ));
            echo '<script language="javascript">alert("Te has registrado apropiadamente"); window.location.href="/";</script>';
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
    }

    //---------------------------------------------Ver citas------------------------------------------//
    public function vercitas()
    {
        $usuarios = DB::table('citas')->get();
        return view("templates.usuarios")
        ->with(['usuarios' => $usuarios]);
    }
    //----------------------------------------------Ver doctores--------------------------------------//
    public function verdoctores()
    {
        $doctores = DB::table('doctores')->get();
        return view("templates.doctores")
        ->with(['doctores' => $doctores]);
    }
    
    //----------------------------------------------Ver Consultorios-----------------------------------//
    public function verconsultorios()
    {
        $consultorios = DB::table('consultorios')->get();
        return view("templates.consultorios")
        ->with(['consultorios' => $consultorios]);
    }
    //----------------------------------------------Ver Especialidades-----------------------------------//
    public function verespecialidades()
    {
        $especialidades = DB::table('especialidades')->get();
        return view("templates.especialidades")
        ->with(['especialidades' => $especialidades]);
    }
    //----------------------------------------------Ver consultas-----------------------------------//
    public function verconsultas()
    {
        $consultas = DB::table('consulta')->get();
        return view("templates.consultas")
        ->with(['consultas' => $consultas]);
    }
}


