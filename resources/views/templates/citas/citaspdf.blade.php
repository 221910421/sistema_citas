<style>
    .titulo{
      text-align: center;
      color: blue;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      width: 100%;
    }
    #container{
      background-color: rgb(251, 245, 245);
      width: 200px;
      height: 90px;
      margin-left:auto; margin-right:0;
    }
  </style>
<center><h1>Reporte de citas</h1></center>
<div id="table-content" class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>CURP del paciente</h3>
                </th>
                <th>
                    <h3>Folio</h3>
                </th>
                <th>
                    <h3>Fecha</h3>
                </th>
                <th>
                    <h3>Hora</h3>
                </th>
                <th>
                    <h3>Estatus</h3>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
            <tr>
                <td>{{$cita->curp_paciente}}</td>
                <td>{{$cita->folio}}</td>
                <td>{{$cita->fecha_cita}}</td>
                <td>{{$cita->hora_cita}}</td>
                <td>{{$cita->estatus_cita}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

