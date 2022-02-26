@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Reporte de citas</h1>
<table>
    <thead>
    <tr>
        <th>
            <h3>id_paciente</h3>
        </th>
        <th>
            <h3>id_doctor</h3>
        </th>
        <th>
            <h3>id_especialidad</h3>
        </th>
        <th>
            <h3>estatus_cita</h3>
        </th>
        <th>
            <h3>fecha_cita</h3>
        </th>
        <th>
            <h3>hora_cita</h3>
        </th>
        <th>
            <h3>id_consultorio</h3>
        </th>
    </tr>
</thead>
<tbody>
    @foreach ($citas as $cita)
    <tr>
        <td>{{$cita->id_paciente}}</td>
        <td>{{$cita->id_doctor}}</td>
        <td>{{$cita->id_especialidad}}</td>
        <td>{{$cita->estatus}}</td>
        <td>{{$cita->fecha}}</td>
        <td>{{$cita->hora}}</td>
        <td>{{$cita->id_consultorio}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection