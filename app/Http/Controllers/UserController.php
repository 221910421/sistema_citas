<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacientes;
use \Crypt;
use File;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function verdatosuser()
    {
        $mis_datos = pacientes::select('*')->where('id_pacientes','=',session('session_id'))->get();
        foreach($mis_datos as $password){
            $contraseña = Crypt::decrypt($password->contraseña);
            $rfc = Crypt::decrypt($password->curp);
        }
        return view('templates.mis_datos')
        ->with(["mis_datos" => $mis_datos])
        ->with(["rfc" => $rfc])
        ->with(['contraseña' => $contraseña]);
    }

    public function actualizar_datos(Request $request)
    {
        if($request->file('foto') != ''){

            $borrar = File::delete(public_path('images/user/' . session('session_foto')));

            $file = $request->file('foto');

            $foto =md5($file->getClientOriginalName()); 

            $extension = $file->getClientOriginalExtension();

            $date = date('Ymd_His_');
                $foto2 =  $date . $foto . "." .$extension;

            $file->move(public_path("images/user/"),$foto2);

            $request->session()->put('session_foto', $foto2);
        }else{
            $foto2 = $request['foto_original'];
        }

        $actualizar_dato = DB::table('pacientes')->where('id_pacientes', session('session_id'))->update(['nombre' => strtoupper($request['nombre']), 
        'apellido_paterno' => strtoupper($request['apellido_paterno']),
        'apellido_materno' => strtoupper($request['apellido_materno']),
        'genero' => $request['genero'],
        'edad' => $request['edad'],
        'calle' => strtoupper($request['calle']),
        'numero' => $request['numero'],
        'codigo_postal' => $request['cp'],
        'foto' =>  $foto2,
        'municipio' => $request['municipio'],
        'telefono' => $request['telefono'],
        'correo' => $request['correo'],
        'curp' => Crypt::encrypt( strtoupper($request['curp']))
    ]);
    echo '<script language="javascript">alert("Tus datos se han actualizado correctamente"); window.location.href="/misdatos";</script>';
    }

    public function verificar_correo(Request $request){
        $usuarios = pacientes::select('codigo')->where('id_pacientes', '=', session('session_idtemp'))->get();
        foreach ($usuarios as $usuario){
            $codigousu = $usuario->codigo;
        }
        $codigo = $request['codigo'];
        if($codigo == $codigousu){
            $actualizar_dato = DB::table('pacientes')->where('id_pacientes', session('session_idtemp'))->update(['correo_verificado' => 'si', 'codigo' => '-----']); 
            $request->session()->forget('session_idtemp');
            echo '<script language="javascript">alert("Gracias por vericar tu correo, ya puedes iniciar sesión"); window.location.href="/";</script>';
        }else{
            echo'<script type="text/javascript">
                        alert("El código de verificación ingresado es incorrecto");
                        history.go(-1);
                        </script>';  
        }
    }
}
