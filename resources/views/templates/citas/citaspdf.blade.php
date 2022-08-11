
<h1>Reporte de citas</h1>
<form action="" method="get">
    <label for="">Elija el campo del que desea tomar la información:</label>
    <select name="campo" id="campo">
        <option value="">Elija una opción</option>
        <option value="fecha_cita">Fecha</option>
        <option value="hora_cita">Hora</option>
        <option value="folio">Folio</option>
    </select>
    <br>
    <label for="">Buscar: </label>
    <input type="text" name="buscar" id="buscar" placeholder="Termino a buscar" onkeyup="comprobarHora()">
</form>
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
                <th>
                    <h3>opciones</h3>
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
                <td>
                    <form action="{{route('detalles_cita')}}" method="post">
                        @csrf
                        <input type="text" name="id" readonly value="{{$cita->id_cita}}" hidden>
                        <input type="text" name="paciente" readonly value="{{$cita->id_paciente}}" hidden>
                        <input type="text" name="folio" readonly value="{{$cita->folio}}" hidden>
                        <input type="submit"
                            style="border-radius: 5px; width: 130px; cursor: pointer; background-color: aqua;"
                            value="Ver detalles">
                    </form>
                    <form id="cancelar" action="{{route('cancelar_cita')}}" method="post">
                        @csrf
                        <input type="text" name="id" readonly value="{{$cita->id_cita}}" hidden>
                        <input type="text" name="folio" readonly value="{{$cita->folio}}" hidden>
                        @if($cita->estatus_cita != "Cancelado")
                        <input type="submit" value="Cancelar cita"
                            style="border-radius: 5px; width: 130px; cursor: pointer; background-color: red;">
                            
                        @else
                        <input type="button" value="Cancelar cita"
                            style="border-radius: 5px; width: 130px; cursor: pointer; background-color: red;" onclick="cancelado()">
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="sesion">

</div>
