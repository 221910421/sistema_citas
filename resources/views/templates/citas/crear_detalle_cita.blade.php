@extends('templates-layouts.headerandfooter')
@if(empty(session('session_id')))
<script type="text/javascript">
    alert("No tiene los permisos suficientes para acceder a esta ventana por favor inicie sesión o contacte a un administrador");
    window.location.href = "/";
</script>
@else
@section('body')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var refreshId = setInterval(function () {
            $('#sesion').load("{{route('verificar_sesion')}}");
        }, 500);
    });
</script>
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
            <h3 class="title">Crear los detalles de la cita con folio: {{$folio}}</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con los datos para registrar los datos de la cita con folio
                    {{$folio}}</h5>
                <form action="{{route('guardar_detalles_cita')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Estatura en cm*:</label>
                        <input type="text" class="form-control" placeholder="ej: 150 cm" name="estatura"
                            id="recipient-name" required="">
                    </div>
                    <input type="text" value="{{$id}}" readonly hidden name="id_cita"> <input type="text" name="folio"
                        id="folio" readonly hidden value="{{$folio}}"> <input type="text" name="paciente" id="paciente"
                        value="{{$paciente}}" hidden>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Peso en KG*:</label>
                        <input type="text" class="form-control" placeholder="ej. 65" name="peso" id="recipient-name"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Temperatura en C°*:</label>
                        <input type="text" class="form-control" placeholder="35" name="temperatura" id="recipient-name"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Alergias*:</label>
                        <textarea name="alergias" id="alergias" cols="30" rows="10" required
                            placeholder="Ingrese las alergias del paciente"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sintomas*:</label>
                        <textarea name="sintomas" id="sintomas" cols="30" rows="10" required
                            placeholder="Ingrese los sistomas del paciente"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Diagnostico:*:</label>
                        <textarea name="diagnostico" id="diagnostico" cols="30" rows="10" required
                            placeholder="Ingrese el diagnostico del paciente por favor sea cuidadoso"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Medicamentos a recetar*:</label>
                        <textarea name="medicamentos" id="medicamentos" cols="30" rows="10" required
                            placeholder="Ingrese los medicamentos que se le receto al paciente"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Imágen</label>
                        <input type="file" name="observacion" id="observacion">
                    </div>
                    <input type="submit" value="Guardar nuevo usuario" class="btn_apt">
                </form>
            </div>
            <div class="clerafix"></div>
        </div>
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
@endsection
@endif