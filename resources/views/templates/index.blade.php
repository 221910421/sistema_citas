@extends('templates-layouts.headerandfooter')
@section('body')
<h2>Bienvenido</h2>
<a href="">Iniciar sesión</a>
<a href="{{route('crear_usuario')}}">Crear usuario</a>
@endsection