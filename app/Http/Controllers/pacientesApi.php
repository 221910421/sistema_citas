<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacientes;
use \Crypt;

class pacientesApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::all();
        return $pacientes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pacientes = new pacientes();
        $pacientes->nombre = strtoupper($request->nombre);
        $pacientes->apellido_paterno = strtoupper($request->apellido_paterno);
        $pacientes->apellido_materno = strtoupper($request->apellido_materno);
        $pacientes->genero = $request->genero;
        $pacientes->edad = $request->edad;
        $pacientes->foto = 'shadow.png';
        $pacientes->calle = strtoupper($request->calle);
        $pacientes->numero = $request->numero;
        $pacientes->codigo_postal = $request->codigo_postal;
        $pacientes->municipio = strtoupper($request->municipio);
        $pacientes->telefono = $request->telefono;
        $pacientes->correo = $request->correo;
        $pacientes->contraseña = $request->contraseña;
        $pacientes->curp = strtoupper($request->curp);
        $pacientes->estatus = 'Activo';
        $pacientes->codigo = '-----';
        $pacientes->correo_verificado = 'si';

        $pacientes->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $correo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pacientes = pacientes::select('*')->where('correo','=',$request['correo'])->where('estatus', '=', 'Activo')->get();
        return $pacientes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pacientes = Pacientes::findOrFail($request->id_paciente);

        $pacientes->foto = $request->foto;
        $pacientes->calle = strtoupper($request->calle);
        $pacientes->numero = $request->numero;
        $pacientes->codigo_postal = $request->codigo_postal;
        $pacientes->municipio = strtoupper($request->municipio);
        $pacientes->correo = $request->correo;
        $pacientes->contraseña = Crypt::encrypt($request->contraseña);

        $pacientes->save();

        return $pacientes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pacientes = pacientes::destroy($request->id_paciente);

        return $pacientes;
    }
}
