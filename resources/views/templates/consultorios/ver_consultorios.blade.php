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
</script><br>
<center><h1>Reporte de consultorios</h1></center><br>
<form action="{{route('nuevo_consultorio')}}" method="get">
    <input style="border-radius: 4px; background-color:green" type="submit" value="Crear nuevo consultorio"></form>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>Consultorio</h3>
                </th>
                <th>
                    <h3>Especialidad</h3>
                </th>
                <th>
                    <h3>Estatus</h3>
                </th>
                <th>
                    <h3>Opciones</h3>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultorios as $consultorio)
            <tr>
                <td>{{$consultorio->numero_de_consultorio}}</td>
                @foreach($especialidades as $especialidad)
                <td>{{$especialidad->nombre_especialidad}}</td>
                @endforeach
                <td>{{$consultorio->estatus}}</td>
                <td>
                    <form action="{{route('editar_consultorio')}}" method="post"> 
                        @csrf
                    <input type="text" name="id" id="id" value="{{$consultorio->id_consultorio}}" hidden>
                    <input style="border-radius: 4px; background-color:green" type="submit" value="Editar consultorio">
                    </form>
                    <form action="{{route('borrar_consultorio')}}" method="POST">
                        @csrf
                        <input type="text" name="id" id="id" value="{{$consultorio->id_consultorio}}" hidden>
                        <input style="border-radius: 4px; background-color:red" type="submit" value="Borrar consultorio">
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