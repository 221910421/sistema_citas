@extends('templates-layouts.headerandfooter')
@if(empty(session('session_id')))
<script type="text/javascript">
    alert("No tiene los permisos suficientes para acceder a esta ventana por favor inicie sesión o contacte a un administrador");
    window.location.href = "/";
</script>
@else
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
            $('#sesion').load("{{route('verificar_sesion')}}");
        }, 500);
    });
</script>
<center><h1>Reporte de especialidades</h1></center>
<form action="{{route('crear_especialidad')}}" method="get">
    <input style="border-radius: 4px; background-color:green" type="submit" value="Crear nueva especialidad"></form>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>Numero de especialidad</h3>
                </th>
                <th>
                    <h3>Nombre</h3>
                </th>
                <th>
                    <h3>Precio</h3>
                </th>
                <th>
                    <h3>Opciones</h3>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($especialidades as $especialidad)
            <tr>
                <td>{{$especialidad->id_especialidad}}</td>
                <td>{{$especialidad->nombre_especialidad}}</td>
                <td>{{$especialidad->precio}}</td>
                <td>
                    <form action="{{route('editar_especialidad')}}" method="post"> 
                        @csrf
                    <input type="text" name="id" id="id" value="{{$especialidad->id_especialidad}}" hidden>
                    <input style="border-radius: 4px; background-color:green" type="submit" value="Editar especialidad">
                    </form>
                    <form action="{{route('borrar_especialidad')}}" method="POST">
                        @csrf
                        <input type="text" name="id" id="id" value="{{$especialidad->id_especialidad}}" hidden>
                        <input style="border-radius: 4px; background-color:red" type="submit" value="Borrar especialidad">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="sesion">

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
@endif