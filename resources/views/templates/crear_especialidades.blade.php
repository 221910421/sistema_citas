@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Ingresa los datos del formulario para registrarte</h1>
<form action="{{route('guardar_especialidad')}}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Nombre:</label><br>
  <input type="text" name="nombre"><br><br>
  <label>Precio:</label><br>
  <input type="number" name="precio"><br><br>
  <label>id_consultorio:</label><br>
  <input type="number" name="id_consultorio"><br><br>
  <input type="submit" value="Crear especialidad">
</form>

@endsection
