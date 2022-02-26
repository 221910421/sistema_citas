@extends('templates-layouts.headerandfooter')
@section('body')

<form action="/my-handling-form-page" method="post">
 <ul>
  <li>
    <label>Nombre:</label>
    <input type="text"  name="nombre">
  </li>
  <li>
    <label>Apellido paterno:</label>
    <input type="text" name="apellido_paterno">
  </li>
  <li>
    <label>Apellido materno:</label>
    <input type="text" name="apellido_materno">
  </li>
  <li>
  genero<br/>
    <input type="radio" name="sexo" value="V"/> Hombre<br/>
    <input type="radio" name="sexo" value="M"/> Mujer
  </li>
  <li>
    <label>Edad:</label>
    <input type="text"  name="edad">
  </li>
  <li>
    <label>Calle:</label>
    <input type="text" name="calle">
  </li>
  <li>
    <label>Numero:</label>
    <input type="text" name="numero">
  </li>
  <li>
    <label>Codigo Postal:</label>
    <input type="text" name="codigo_postal">
  </li>
  <li>
    <label>Municipio:</label>
    <input type="text" name="municipio">
  </li>
  <li>
    <label>Telefono:</label>
    <input type="text" name="telefono">
  </li>
  <li>
    <label>Correo electrónico:</label>
    <input type="email" name="correo_electronico">
  </li>
  <li>
    <label>Contraseña:</label>
    <input type="text" name="contraseña">
  </li>
  <li>
    <label>RFC:</label>
    <input type="text" name="rfc">
  </li>
  <li>
    <label>Activo:</label>
    <input type="text" name="activo">
  </li>
 </ul>
</form>

<li class="button">
  <button type="submit">Envíe su mensaje</button>
</li>

@endsection
