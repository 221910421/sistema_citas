@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Reporte de Especialidades</h1>
<table>
    <thead>
    <tr>
        <th>
            <h3>Nombre</h3>
        </th>
        <th>
            <h3>Precio</h3>
        </th>
        <th>
            <h3>id del Consultorio</h3>
        </th>
    </tr>
</thead>
<tbody>
    @foreach ($especialidades as $especialidad)
    <tr>
        <td>{{$especialidad->nombre}}</td>
        <td>{{$especialidad->precio}}</td>
        <td>{{$especialidad->id_consultorio}}</td>
    </tr>

    @endforeach
</tbody>
</table>
@endsection