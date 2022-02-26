@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Reporte de Consultorios</h1>
<table>
    <thead>
    <tr>
        <th>
            <h3>numero_de_consultorio</h3>
        </th>
        <th>
            <h3>id_especialidad</h3>
        </th>
        <th>
            <h3>estatus</h3>
        </th>
    </tr>
</thead>
<tbody>
    @foreach ($consultorios as $consultorio)
    <tr>
        <td>{{$consultorio->numero_de_consultorio}}</td>
        <td>{{$consultorio->id_especialidad}}</td>
        <td>{{$consultorio->estatus}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection