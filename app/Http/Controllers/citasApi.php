<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas;

class citasApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = citas::all();
        return $citas;
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
        $citas = new citas();
        $citas->id_paciente = $request->id_paciente;
        $citas->id_doctor = $request->id_doctor;
        $citas->curp_paciente = $request->curp_paciente;
        $citas->id_especialidad = $request->id_especialidad;
        $citas->folio = $request->folio;
        $citas->estatus_cita = "Activo";
        $citas->fecha_cita = $request->fecha_cita;
        $citas->hora_cita = $request->hora_cita;
        $citas->id_consultorio = $request->id_consultorio;

        $citas->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $citas = citas::select('*')->where('curp_paciente','=',$request['curp'])->get();
        return $citas;
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
        $citas = citas::findOrFail($request->id_cita);;

        $citas->folio = $request->folio;
        $citas->fecha_cita = $request->fecha_cita;
        $citas->hora_cita = $request->hora_cita;

        $citas->save();

        return $citas;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $citas = citas::destroy($request->id_cita);

        return $citas;
    }
}
