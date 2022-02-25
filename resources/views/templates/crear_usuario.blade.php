@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Ingresa los datos del formulario para registrarte</h1>
<form action="{{route('guardar_usuario')}}" method="post">
  <label>Nombre:</label><br>
  <input type="">
</form>

@endsection
