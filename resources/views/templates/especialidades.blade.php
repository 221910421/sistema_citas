@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Reporte de especialidades</h1>
<table>
    <thead>
    <tr>
        <th>
            <h3>nombre</h3>
        </th>
        <th>
            <h3>precio</h3>
        </th>
        <th>
            <h3>id_consultorio</h3>
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