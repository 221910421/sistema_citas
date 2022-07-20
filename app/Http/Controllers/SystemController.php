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
use \App\Mail\NuevoUsuario;
use \Mail;
use \Crypt;//---->Se llama a la librería que nos permite encriptar las fotografías y contraseñas.

use App\Exports\RegcitasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;




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

            $foto =md5($file->getClientOriginalName());

            $extension = $file->getClientOriginalExtension();

            $date = date('Ymd_His_');
                $foto2 =  $date . $foto . "." .$extension;

            $file->move(public_path("images/user/"),$foto2);
        }else{
            $foto2 = "shadow.png";
        }
        $length = 10;
        $codigo= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
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
                'curp' => Crypt::encrypt( strtoupper($request['curp'])),
                'estatus' => $request['estatus'],
                'codigo' => $codigo,
                'correo_verificado' => 'no'
            ));
            $data =[
                'correo' => $request['correo'],
                'nombre' => strtoupper($request['nombre']) . " " . strtoupper($request['apellido_paterno']) . " " .  strtoupper($request['apellido_materno']),
                'fecha' => date('d-m-Y'),
                'codigo' => $codigo
            ];

            try {
                Mail::to($request['correo'])->send(new NuevoUsuario($data));
                echo '<script language="javascript">alert("Te has registrado apropiadamente"); window.location.href="/";</script>';
            } catch (\Exception $e) {
                echo'<script type="text/javascript">
                        alert("Te has registrado apropiadamento pero no hemos podido enviar el correo lo sentimos");
                        window.location.href="/";
                        </script>';
            }
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
        $consultorios = consultorios::all();
        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        $next_date = date('Y-m-d', strtotime($date .' +1 day'));
        if(count($especialidades) == 0){
            echo '<script language="javascript">alert("No existe ninguna especialidad por favor creela"); window.location.href="crear_especialidad";</script>';
        }elseif(count($consultorios)==0){
            echo '<script language="javascript">alert("No existe ningun consultorio por favor creela"); window.location.href="nuevo_consultorio";</script>';
        }else{
            return view('templates.citas.crear_cita')
            ->with(["especialidades" => $especialidades])
            ->with(['next_date' => $next_date]);
        }
    }

//----------------------------------------Busqueda tiempo real-------------------------------------------//
    public function busqueda_tiempo_real(Request $request){
        $terminob = $request['termino'];
        $campo = $request['campo'];
        $citas = citas::select('*')->where($campo, 'like', '%'.$terminob.'%')->get();
        if(count($citas) >= 1){
            foreach($citas as $cita){
                $curp = Crypt::decrypt($cita->curp_paciente);
            }
            return view('templates.citas.tabla_citas')
            ->with(['citas' => $citas])
            ->with(['curp' => $curp]);
        }else{
            return view('templates.citas.tabla_citas')
            ->with(['citas' => $citas])
            ->with(['campo' => $campo])
            ->with(['terminob' => $terminob]);
    }
    }


//----------------------------------------Guardar cita------------------------//
    public function guardar_cita(Request $request){
        $letra_usu = substr(session("session_name"), 0, 2);
        $folio = $request['especialidad'].".".$request['fecha'].".".$request['hora'].".".$letra_usu;
        $citaexist = DB::select("SELECT * FROM citas  WHERE folio = '$folio' AND estatus_cita = 'Activo'");
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
        echo '<script language="javascript">alert("Cita agendada correctamente"); window.location.href="citas";</script>';
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


//-------------------------------------------------------------Comprobar horarios citas------------------------------------------//
public function horarios_cita(Request $request)
{
    $especialidad = $request['especialidad'];
    $consultorio = $request['consultorio'];
    $fecha = $request['fecha'];
    $horas = horarios::all();
    $citas = citas::orderBy('hora_cita', 'ASC')->where('id_consultorio', '=', $consultorio)->where('id_especialidad', '=', $especialidad)->where('fecha_cita', '=', $fecha)->where('estatus_cita', '=', 'Activo')->get();
    return view('templates.citas.horarios.horarios_cita')
    ->with(["horas" => $horas])
    ->with(["citas" => $citas]);
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

//---------------------------------------------------Ver consultorios------------------------------------------------//
    public function consultorios()
    {
        $consultorios = consultorios::all();
        if(count($consultorios) == 0){
            echo 'No hay consultorios';
        }else{
        foreach($consultorios as $consul){
            $id = $consul->id_especialidad;
        }

        $especialidades = especialidades::select('*')->where('id_especialidad', '=', $id)->get();

        return view("templates.consultorios.ver_consultorios")
        ->with(["consultorios" => $consultorios])
        ->with(["especialidades" => $especialidades]);
        }
    }


//---------------------------------------------------Editar consultorio----------------------------------------------//
    public function editar_consultorio(Request $request)
    {
        $consultorioE = consultorios::select('*')->where('id_consultorio', '=', $request['id'])->get();
        $especialidades = especialidades::all();
        return view('templates.consultorios.editar_consultorio')
        ->with(["consultorioE" => $consultorioE])
        ->with(["especialidades" => $especialidades]);
    }

//----------------------------------------------------Actualizar consultorio----------------------------------------------------//
    public function actualizar_consultorio(Request $request){
        $especialidad = $request['id_especialidad'];

        if($especialidad == 0){
        $cancelar_cita = DB::table('consultorios')->where('id_consultorio', '=', $request['id'])->update([
            'numero_de_consultorio' => $request['numero_de_consultorio'],
            'id_especialidad' => $request['especialidad']
        ]);
        }else{
            $cancelar_cita = DB::table('consultorios')->where('id_consultorio', '=', $request['id'])->update([
                'numero_de_consultorio' => $request['numero_de_consultorio'],
                'id_especialidad' => $request['id_especialidad']
            ]);
        }
        echo '<script language="javascript">alert("Tu consultorio se a actualizado correctamente"); window.location.href="/consultorios";</script>';
    }

//---------------------------------------------------Borrar consultorio----------------------------------------------//
    public function borrar_consultorio(Request $request)
    {
        $id_consultorio = $request['id'];
        $consultorios = consultorios::select('*')->where('id_consultorio', '=', $id_consultorio)->delete();
        echo '<script language="javascript">alert("Tu consultorio se borro correctamente"); window.location.href="/consultorios";</script>';
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
            echo '<script language="javascript">alert("Tu especialidad se guardo exitosamente"); window.location.href="/ver_especialidad";</script>';
        }
    }

//--------------------------------------------Ver especialidades-----------------------------------------
public function ver_especialidad (){
        $especialidades = especialidades::all();
        return view('templates.especialidades.ver_especialidad')
        ->with(['especialidades' => $especialidades]);
    }


  public function editar_especialidad(Request $request)
  {
      $especialidades = especialidades::select('*')->where('id_especialidad', '=', $request['id'])->get();
      return view('templates.especialidades.editar_especialidad')
      ->with(["especialidades" => $especialidades]);
  }

  public function actualizar_especialidad(Request $request)
  {
        $cancelar_cita = DB::table('especialidades')->where('id_especialidad', '=', $request['id'])->update([
        'nombre_especialidad' => $request['especialidad'],
        'precio' => $request['precio']
        ]);
    echo '<script language="javascript">alert("Tu especialidad se actualizo exitosamente"); window.location.href="/ver_especialidad";</script>';
  }

  public function borrar_especialidad(Request $request)
    {
        $especialidades = especialidades::select('*')->where('id_especialidad', '=', $request['id'])->delete();
        echo '<script language="javascript">alert("Tu especialidad se borro correctamente"); window.location.href="/ver_especialidad";</script>';
    }

//////////////////excel
    
    public function export(Request $req)
    {
        return Excel::download(new RegcitasExport($req->citas), 'citas.xlsx');
        
    }

    
////////////pdf

    public function download(Request $req)
    {
        $crit = $req['crit'];
    
        $citas =DB::SELECT("SELECT * FROM citas WHERE id_paciente LIKE '%$crit%' OR id_doctor LIKE '%$crit%' OR id_especialidad LIKE '%$crit%' OR curp_paciente LIKE '%$crit%' OR estatus_cita LIKE '%$crit%' OR folio LIKE '%$crit%' OR fecha_cita LIKE '%$crit%' OR hora_cita LIKE '%$crit%' OR id_consultorio LIKE '%$crit%'");
    
        $pdf = PDF::loadView('templates.citas.citaspdf', ['citas' => $citas]);
          return $pdf->download('citas.pdf'); 
    }
}
