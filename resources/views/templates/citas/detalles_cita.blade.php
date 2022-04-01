@extends('templates-layouts.headerandfooter')
@section('body')
@if(empty(session('session_id')))
<script type="text/javascript">
    alert("No tiene los permisos suficientes para acceder a esta ventana por favor inicie sesión o contacte a un administrador");
    window.location.href = "/";
</script>
@else
<div class="inner-banner-w3ls">
    <div class="container">

    </div>
    <!-- //banner 2 -->
</div>
<!-- page details -->
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('citas')}}">Citas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalles cita</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Detalles de la cita con folio: {{$folio}}</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <center>
        <table>
            <tr>
                <td>Nombre del paciente: </td><td>{{$nombre_completopa}}</td>
            </tr>
            <tr>
                <td>Folio de la cita:</td><td>{{$folio}}</td>
            </tr>
            @foreach($citas as $cita)
            <tr>
                <td>Estatura del paciente</td><td>{{$cita->estatura}} cm</td>
            </tr>
            <tr>
                <td>Peso:</td><td>{{$cita->peso}} kg</td>
            </tr>
            <tr>
                <td>Temperatura:</td><td>{{$cita->temperatura}}°C</td>
            </tr>
            <tr>
                <td>Alergías:</td><td>{{$cita->alergias}}</td>
            </tr>
            <tr>
                <td>Sintomas:</td><td>{{$cita->sintomas}}</td>
            </tr>
            <tr>
                <td>Diagnostico:</td><td>{{$cita->diagnostico}}</td>
            </tr>
            <tr>
                <td>Medicamentos recetados:</td><td>{{$cita->medicamentos_recetados}}</td>
            </tr>
            @if($cita->observaciones != "N/A")
            <tr>
                <td>Imagen observaciones:</td><td><a href="{{('images/user/'.$cita->observaciones)}}">Ver imagen completa</a></td>
            </tr>
            @else
            @endif
            @endforeach
        </table>
        @if($cita->observaciones != "N/A")
        <img src="{{('images/user/'.$cita->observaciones)}}" alt="imagen citas" width="25%" height="auto">
        @else
        <p>No se subio ninguna imagen a esta consulta</p>
        @endif
    </center>
        <div class="clerafix"></div>
    </div>
</div>

<!-- //contact -->
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

<!-- fixed navigation -->
<script src="js/fixed-nav.js"></script>
<!-- //fixed navigation -->

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
@endif
@endsection