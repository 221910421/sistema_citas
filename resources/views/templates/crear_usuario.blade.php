@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Ingresa los datos del formulario para registrarte</h1>
<form action="{{route('guardar_usuario')}}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Nombre:</label><br>
  <input type="text" name="nombre"><br><br>
  <label>Apellido paterno:</label><br>
  <input type="text" name="apellido_paterno"><br><br>
  <label>Apellido materno:</label><br>
  <input type="text" name="apellido_materno"><br><br>
  <label>Genero:</label><br>
  <input type="radio" value="Hombre" checked name="genero"><label>Hombre</label>
  <input type="radio" value="Mujer" name="genero"><label>Mujer</label><br><br>
  <label>Edad:</label><br>
  <input type="number" name="edad"><br><br>
  <label>Foto:</label><br>
  <input type="file" name="foto"><br><br>
  <label>calle:</label><br>
  <input type="text" name="calle"><br><br>
  <label>numero:</label><br>
  <input type="number" name="numero"><br><br>
  <label>Codigo postal:</label><br>
  <input type="text" name="cp"><br><br>
  <label>Municipio:</label><br>
  <input type="text" name="municipio"><br><br>
  <label>telefono:</label><br>
  <input type="tel" name="telefono"><br><br>
  <label>correo:</label><br>
  <input type="mail" name="correo"><br><br>
  <label>Contraseña:</label><br>
  <input type="password" name="contraseña"><br><br>
  <label>Confirmar contraseña:</label><br>
  <input type="password" name="confirmarcon"><br><br>
  <label>RFC:</label><br>
  <input type="text" name="rfc"><br><br>
  <input type="submit" value="Crear usuario">
</form>

@endsection
