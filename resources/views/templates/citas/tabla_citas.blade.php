@if(count($citas) == 0)
    <h2 style="text-align: center;">No se han encontrado datos en la tabla citas en el campo {{$campo}} con el siguiente termino de busqueda {{$terminob}}</h2>
@else
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
            <td>{{$curp}}</td>
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
                    @if($cita->folio != "Cancelado")
                    <input type="button" value="Cancelar cita"
                        style="border-radius: 5px; width: 130px; cursor: pointer; background-color: red;"
                        onclick="confirmacion()">
                    @else
                    <input type="button" value="Cancelar cita"
                        style="border-radius: 5px; width: 130px; cursor: pointer; background-color: red;"
                        onclick="cancelado()">
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif