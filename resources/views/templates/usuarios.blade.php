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
<h1>Reporte de Pacientes</h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>Nombre completo</h3>
                </th>
                <th>
                    <h3>Foto</h3>
                </th>
                <th>
                    <h3>Edad</h3>
                </th>
                <th>
                    <h3>Telefono</h3>
                </th>
                <th>
                    <h3>Correo</h3>
                </th>
               <th>
                   <h3>Opciones</h3>
               </th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</td>
                <td><img src="{{('images/user/'.$usuario->foto)}}" class="foto_perfil" alt="foto de perfil"
                        height="60px" ; width="60"></td>
                <td>{{$usuario->edad}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->correo}}</td>
                <td><form action="{{route('detallesusu')}}" method="post">
                    @csrf
                    <input type="text" name="id" readonly value="{{$usuario->id_pacientes}}" hidden>
                    <input type="submit" style="border-radius: 5px; width: 100px; cursor: pointer; background-color: aqua;" value="Ver detalles">
                </form></td>
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