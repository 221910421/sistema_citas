@extends('templates-layouts.headerandfooter')
@section('body')
<h2>Bienvenido</h2>
<a href="">Iniciar sesión</a><br><br>
<a href="{{route('crear_usuario')}}">Crear usuario</a><br><br>
<a href="{{route('usuarios')}}">Ver usuarios</a><br><br>
@endsection