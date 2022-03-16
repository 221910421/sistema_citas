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

        $usuarios = pacientes::select('*')->where('correo','=',$usuarioc)->get();

        foreach($usuarios as $usuario){
            $decryptpass = Crypt::decrypt($usuario->contraseña);
            $correo = $usuario->correo;
        }

        if($correo = $usuario && $decryptpass = $contraseña){
            $consulta = DB::select("SELECT * FROM pacientes WHERE correo = '$usuarioc'");
            print_r($consulta);

            $request->session()->put('session_id', $consulta[0]->id_pacientes);
            $request->session()->put('session_name', $consulta[0]->nombre);
            $request->session()->put('session_ap', $consulta[0]->apellido_paterno);
            $request->session()->put('session_am', $consulta[0]->apellido_materno);
            $request->session()->put('session_correo', $consulta[0]->correo);
            $request->session()->put('session_password', $consulta[0]->contraseña);
            $request->session()->put('session_foto', $consulta[0]->foto);

            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_ap = $request->session()->get('session_ap');
            $session_am = $request->session()->get('session_am');
            $session_correo = $request->session()->get('session_correo');
            $session_password = $request->session()->get('session_password');
            $session_foto = $request->session()->get('session_foto');
            return redirect(route('index'));
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
