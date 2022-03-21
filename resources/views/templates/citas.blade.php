@extends('templates-layouts.headerandfooter')
@section('body')
<div class="inner-banner-w3ls">
    <div class="container">

    </div>
    <!-- //banner 2 -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var refreshId = setInterval(function () {
            $('#table-content').load("{{route('actualizartablausu')}}");
        }, 1000);
    });
</script>
<h1>Reporte de citas</h1>
<table>
    <thead>
    <tr>
        <th>
            <h3>Doctor</h3>
        </th>
        <th>
            <h3>Especialidad</h3>
        </th>
        <th>
            <h3>Estatus</h3>
        </th>
        <th>
            <h3>Fecha</h3>
        </th>
        <th>
            <h3>Hora</h3>
        </th>
        <th>
            <h3>Consultorio</h3>
        </th>
    </tr>
</thead>
<tbody>
    @foreach ($citas as $cita)
    <tr>
        <td>{{$cita->id_paciente}}</td>
        <td>{{$cita->id_doctor}}</td>
        <td>{{$cita->id_especialidad}}</td>
        <td>{{$cita->estatus_cita}}</td>
        <td>{{$cita->fecha_cita}}</td>
        <td>{{$cita->hora_cita}}</td>
        <td>{{$cita->id_consultorio}}</td>
    </tr>
    @endforeach
</tbody>
</table>

</div>

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