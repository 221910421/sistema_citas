<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas;
use App\Models\pacientes;
use App\Models\especialidades;
use App\Models\consultorios;
use App\Models\consultas;
use App\Models\horarios;
use Illuminate\Support\Facades\DB;
use \Crypt;//---->Se llama a la librería que nos permite encriptar las fotografías y contraseñas.


class SystemController extends Controller
{
    //----------------------------------------------Ver pacientes---------------------------------------//
    public function verusuarios()
    {
        $usuarios = pacientes::all();
        return view('templates.usuarios')
        ->with(['usuarios' => $usuarios]);
    }

    //----------------------------------------------Actualizar tabla usuarios--------------------------//
    public function verificar_sesion()
    {
        if(empty(session('session_id'))){
            echo '<script language="javascript"> alert("No tiene los permisos suficientes para acceder a esta ventana por favor inicie sesión o contacte a un administrador");
            window.location.href = "/";</script>';
        }
    }

    //----------------------------------------------Ver detalles usuario------------------------------//
    public function detallesusu(Request $request)
    {
        $id = $request['id'];
        $usuarios = pacientes::select('*')->where('id_pacientes','=',$id)->get();
        foreach($usuarios as $usuarior){
            $rfc = Crypt::decrypt($usuarior->curp);
        }
        return view('templates.detalles-usu')
        ->with(['usuarios' => $usuarios])
        ->with('rfc', $rfc);
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
                'contraseña' => Crypt::encrypt($contraseña),
                'curp' => Crypt::encrypt($request['curp']),
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


//----------------------------------------- ver citas ------------------------------//
    public function citas ()
    {
        $citas = citas::orderBy('fecha_cita', 'ASC', 'hora_cita', 'DESC')->get();
        if(count($citas) >= 1){
            foreach($citas as $cita){
                $curp = Crypt::decrypt($cita->curp_paciente);
            }
            return view('templates.citas.ver_citas')
            ->with(['citas' => $citas])
            ->with(['curp' => $curp]);
        }else{
            return view('templates.citas.ver_citas')
            ->with(['citas' => $citas]);
    }
    }

//-----------------------------------------crear_cita-------------------------//
    public function nueva_cita(){
        $especialidades = especialidades::all();
        $citas = citas::select('hora_cita')->get();
        $horas = horarios::all();
        return view('templates.citas.crear_cita')
        ->with(["especialidades" => $especialidades])
        ->with(["citas" => $citas ])
        ->with(["horas" => $horas]);
    }

//----------------------------------------Guardar cita------------------------//
    public function guardar_cita(Request $request){
        $letra_usu = substr(session("session_name"), 0, 2); 
        $folio = $request['especialidad'].".".$request['fecha'].".".$request['hora'].".".$letra_usu;
        $citaexist = DB::select("SELECT * FROM citas  WHERE folio = '$folio'");
        if(count($citaexist) == 0){
        $paciente = citas::create(array(
            'id_paciente' => session('session_id'),
            'id_doctor' => 1,
            'id_especialidad' => $request['especialidad'],
            'curp_paciente'=> session('session_curp'),
            'estatus_cita' => "Activo",
            'folio' => $folio,
            'fecha_cita' => $request['fecha'],
            'hora_cita' => $request['hora'],
            'id_consultorio' => $request['consultorio']
        ));
        echo '<script language="javascript">alert("Cita agendada correctamente"); window.location.href="/";</script>';
    }else{
        echo'<script type="text/javascript">alert("Esta cita ya fue agendada con anterioridad");history.go(-1);</script>';
    }
    }

    //----------------------------------------------Ver detalles cita------------------------------//
    public function detalles_cita(Request $request)
    {
        $id = $request['id'];
        $folio = $request['folio'];
        $paciente = $request['paciente'];
        $pacientes = pacientes::select('*')->where('id_pacientes', '=', $paciente)->get();
        $citas = consultas::select('*')->where('id_cita','=',$id)->get();
        if(count($citas)==0){
            echo '<script language="javascript">alert("La cita no cuenta con detalles sera redirigido al formualrio para crear los respectivos");</script>';
            return view('templates.citas.crear_detalle_cita')
            ->with(['id' => $id])
            ->with(['folio' => $folio])
            ->with(['paciente' => $paciente]);
        }else{
            foreach ($pacientes as $paci){
                $nombre_completopa = $paci->nombre." ".$paci->apellido_paterno." ".$paci->apellido_materno; 
            }
            return view('templates.citas.detalles_cita')
            ->with(['folio' => $folio])
            ->with('nombre_completopa', $nombre_completopa)
            ->with(['citas' => $citas]);
        }/**/
    }
//-------------------------------------------------------------guardar detalles cita---------------------------------------------//
    public function guardar_detalles_cita(Request $request)
    {
        if($request->file('observacion') != ''){
            $file = $request->file('observacion');

            $foto =$file->getClientOriginalName(); 

            $date = date('Ymd_His_');
                $foto2 =  $date.$foto;

            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 = "N/A";
        }
        

        $detalles_cita = consultas::create(array(
            'id_cita' => $request['id_cita'],
            'id_paciente' =>$request['paciente'],
            'estatura' => $request['estatura'],
            'peso' => $request['peso'],
            'temperatura' => $request['temperatura'],
            'alergias' => $request['alergias'],
            'sintomas' => $request['sintomas'],
            'diagnostico' => $request['diagnostico'],
            'medicamentos_recetados' => $request['medicamentos'],
            'observaciones' => $foto2,
        ));
        echo '<script language="javascript">alert("Detalles de cita guardada correctamente"); window.location.href="/citas";</script>';

    }

//----------------------------------------------- Cancelar cita-------------------------------------------------//
    public function cancelar_cita(Request $request)
    {
        $id_cita = $request['id'];
        $cancelar_cita = DB::table('citas')->where('id_cita', '=', $id_cita)->update([
            'folio' => 'Cancelado', 
            'estatus_cita' => 'Cancelado'
    ]);

    print_r($id_cita);
    echo '<script language="javascript">alert("La cita se a cancelado correctamente"); window.location.href="/citas";</script>';
    }

//----------------------------------------------- Crear Consultorio-------------------------------------------//
    public function nuevo_consultorio(){
        $especialidades = especialidades::all();
        return view('templates.consultorios.crear_consultorios')
        ->with(["especialidades" => $especialidades]);
    }

//--------------------------------------------------Guardar Consultorio---------------------------------------//
    public function guardar_consultorio(Request $request){
        $consult_exist = consultorios::select('*')->where('numero_de_consultorio', '=', $request['numero_de_consultorio'])->where('id_especialidad', '=', $request['id_especialidad'])->get();
        if(count($consult_exist)==0){
        $consultorio = consultorios::create(array(
            'numero_de_consultorio' => $request['numero_de_consultorio'],
            'id_especialidad' =>$request['id_especialidad'],
            'estatus' => $request['estatus']
        ));

    echo '<script language="javascript">alert("Tu consultorio se guardo exitosamente"); window.location.href="/";</script>';
    }
    }

    
//---------------------------------------------------Guardar especialidad--------------------------------------------//
    public function guardar_especialidad(Request $request)
    {
        $especialidad_exist = especialidades::select('*')->where('nombre_especialidad', '=', $request['especialidad'])->get();
        if(count($especialidad_exist)==0){
            $especialidad = especialidades::create(array(
                'nombre_especialidad' => $request['especialidad'],
                'precio' => $request['precio']
            ));
            echo '<script language="javascript">alert("Tu especialidad se guardo exitosamente"); window.location.href="/";</script>';
        }
    }

//--------------------------------------------Ver especialidades-----------------------------------------
public function ver_especialidad (){{
        $especialidades = especialidades::all();
        return view('templates.especialidades.ver_especialidad')
        ->with(['especialidades' => $especialidades]);
    }
  }
}


