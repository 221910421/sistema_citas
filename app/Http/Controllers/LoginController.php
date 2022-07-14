<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Crypt;
use App\Models\pacientes;

class LoginController extends Controller
{
    public function validar(Request $request)
    {
        $usuarioc = $request['correo'];
        $contraseña = $request['contraseña'];

        $usuarios = pacientes::select('*')->where('correo','=',$usuarioc)->where('estatus', '=', 'Activo')->get();
        if(count($usuarios) == 1){
        foreach($usuarios as $usuario){
            $decryptpass = Crypt::decrypt($usuario->contraseña);
            $cv = $usuario->correo_verificado;
            $id = $usuario->id_pacientes;
            $correo = $usuario->correo;
        }
        $request->session()->put('session_idtemp', $id);

        if($cv == 'no'){
            return view('templates.verificar_correo');
        }else{
            if($correo == $usuarioc && $decryptpass == $contraseña){
                $consulta = DB::select("SELECT * FROM pacientes WHERE correo = '$usuarioc'");

                $request->session()->put('session_id', $consulta[0]->id_pacientes);
                $request->session()->put('session_name', $consulta[0]->nombre);
                $request->session()->put('session_ap', $consulta[0]->apellido_paterno);
                $request->session()->put('session_am', $consulta[0]->apellido_materno);
                $request->session()->put('session_correo', $consulta[0]->correo);
                $request->session()->put('session_password', $consulta[0]->contraseña);
                $request->session()->put('session_foto', $consulta[0]->foto);
                $request->session()->put('session_curp', $consulta[0]->curp);
                return redirect(route('index'));
            }else{
                echo '<script type="text/javascript">
                alert("Contraseña incorrecta por favor verifiquela");
                window.location.href="/";
                </script>';
            }
        }
    }else{
        echo '<script type="text/javascript">
        alert("Usuario no existente o desactivado por favor intentelo de nuevo");
        window.location.href="/";
        </script>';
    }
    }

    public function logout(Request $request)
    {

        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_ap');
        $request->session()->forget('session_am');
        $request->session()->forget('session_correo');
        $request->session()->forget('session_password');

        return redirect(route('index'));
    }
}
