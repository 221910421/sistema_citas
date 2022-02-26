@extends('templates-layouts.headerandfooter')
@section('body')
<h1>Ingresa los datos del formulario para tu consulta</h1>
<form action="{{route('guardar_consulta')}}" method="post" enctype="multipart/form-data">
  @csrf
  <label>id Cita:</label><br>
  <input type="number" name="id_cita"><br><br>
  <label>Nombre del paciente:</label><br>
  <input type="text" name="nombre_paciente"><br><br>
  <label>Apellido paterno:</label><br>
  <input type="text" name="apellido_paterno_paciente"><br><br>
  <label>Apellido materno:</label><br>
  <input type="text" name="apellido_materno_paciente"><br><br>
  <label>Estatura:</label><br>
  <input type="number" name="estatura"><br><br>
  <label>Peso:</label><br>
  <input type="number" name="peso"><br><br>
  <label>Temperatura:</label><br>
  <input type="number" name="temperatura"><br><br>
  <label>Alergias:</label><br>
  <input type="text" name="alergias"><br><br>
  <label>Sintomas:</label><br>
  <input type="text" name="sintomas"><br><br>
  <label>Diagnostico:</label><br>
  <input type="text" name="diagnostico"><br><br>
  <label>Medicamentos Recetados:</label><br>
  <input type="text" name="medicamentos_recetados"><br><br>
  <label>Observaciones:</label><br>
  <input type="text" name="observaciones"><br><br>
  <input type="submit" value="Crear consulta">
</form>


@endsection