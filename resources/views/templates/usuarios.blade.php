@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Reporte de pacientes</h1>
<table>
    <thead>
    <tr>
        <th>
            <h3>Nombre completo</h3>
        </th>
        <th>
            <h3>Foto</h3>
        </th>
        <th>
            <h3>Genero</h3>
        </th>
        <th>
            <h3>Edad</h3>
        </th>
        <th>
            <h3>Dirección</h3>
        </th>
        <th>
            <h3>Codigo postal</h3>
        </th>
        <th>
            <h3>Municipio</h3>
        </th>
        <th>
            <h3>Telefono</h3>
        </th>
        <th>
            <h3>Correo</h3>
        </th>
        <th>
            <h3>RFC</h3>
        </th>
        <th>
            <h3>Estatus</h3>
        </th>
    </tr>
</thead>
<tbody>
    @foreach ($usuarios as $usuario)
    <tr>
        <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</td>
        <td><img src="{{asset('images/'.$usuario->foto)}}" alt="foto de perfil" width="120"></td>
        <td>{{$usuario->genero}}</td>
        <td>{{$usuario->edad}}</td>
        <td>{{$usuario->calle}} {{$usuario->numero}}</td>
        <td>{{$usuario->codigo_postal}}</td>
        <td>{{$usuario->municipio}}</td>
        <td>{{$usuario->telefono}}</td>
        <td>{{$usuario->correo}}</td>
        <td>{{$usuario->rfc}}</td>
        <td>{{$usuario->estatus}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection