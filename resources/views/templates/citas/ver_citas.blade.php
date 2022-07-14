@extends('templates-layouts.headerandfooter')
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
   <br>
    <a href="{{route('excel', ['crit' => $crit])}}">
    <img width="50" height="50" src="images/excel.jpg">
    </a>
    <a href="{{route('pdf', ['crit' => $crit])}}"> 
	<img align="right" width="50" height="50" src="img/pdf.jpg">
    </a>
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

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    function comprobarHora() {
        var campo = $("#campo").val();
        var terminob = document.getElementById("buscar").value;
        num = 0;

        if(campo == ""){
            alert("Seleccione un termino de busqueda y vuelva a intentar");
            document.getElementById("buscar").value="";
        }else{
            $('#table-content').html("<div style='display: flex; justify-content: center; align-items: center;'><progress max='100' value='100'></progress></div><br> <h2 style='text-align: center;'>Cargando 100% </h2>");
            $('#table-content').load("{{route('busqueda_tiempo_real')}}?termino=" + terminob + "&campo=" + campo).serialize();
    }
}
</script>

<!-- Js files -->
<!-- JavaScript -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Default-JavaScript-File -->

<!-- banner slider -->
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 1000,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>


<script>
    function cancelado() {
        alert("Ya se ha cancelado la cita anteriormente");
    }
</script>
<!-- //banner slider -->

<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- move-top -->
<script src="js/move-top.js"></script>
<!-- easing -->
<script src="js/easing.js"></script>
<!--  necessary snippets for few javascript files -->
<script src="js/medic.js"></script>

<script src="js/bootstrap.js"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->

<!-- //Js files -->
@endsection
@endif