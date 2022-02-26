@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Ingresa los datos del formulario</h1>
<form action="{{route('guardar_consultorio')}}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Numero de consultorio:</label><br>
  <input type="number" name="numero_de_consultorio"><br><br>
  <label>id Especialidad:</label><br>
  <input type="number" name="id_especialidad"><br><br>
  <label>id Estatus:</label><br>
  <input type="number" name="id_estatus"><br><br>
  <input type="submit" value="Crear consultorio">
</form>


@endsection