@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Reporte de Doctores</h1>
<table>
    <thead>
    <tr>
        <th>
            <h3>Nombre completo</h3>
        </th>
        <th>
            <h3>Genero</h3>
        </th>
        <th>
            <h3>Edad</h3>
        </th>
        <th>
            <h3>Foto</h3>
        </th>
        <th>
            <h3>Cedula</h3>
        </th>
        <th>
            <h3>Correo</h3>
        </th>
        <th>
            <h3>Contraseña</h3>
        </th>
        <th>
            <h3>Estatus</h3>
        </th>
    </tr>
</thead>
<tbody>
    @foreach ($doctores as $doctor)
    <tr>
        <td>{{$doctor->nombre}} {{$doctor->apellido_paterno}} {{$doctor->apellido_materno}}</td>
        <td>{{$doctor->genero}}</td>
        <td>{{$doctor->edad}}</td>
        <td>{{$doctor->foto}}</td>
        <td>{{$doctor->cedula}}</td>
        <td>{{$doctor->correo}}</td>
        <td>{{$doctor->contraseña}}</td>
        <td>{{$doctor->estatus}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection