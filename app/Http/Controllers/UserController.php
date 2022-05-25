<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacientes;
use \Crypt;
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
            $file = $request->file('foto');

            $foto =$file->getClientOriginalName(); 

            $date = date('Ymd_His_');
                $foto2 =  $date . $foto;

            \Storage::disk('local')->put($foto2, \File::get($file));
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
        'curp' => Crypt::encrypt($request['rfc'])
    ]);
    echo '<script language="javascript">alert("Tus datos se han actualizado correctamente"); window.location.href="/misdatos";</script>';
    }
}
