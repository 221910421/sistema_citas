@extends('templates-layouts.headerandfooter')
@section('body')
@if(empty(session('session_id')))
<script type="text/javascript">
    alert("No tiene los permisos suficientes para acceder a esta ventana por favor inicie sesión o contacte a un administrador");
    window.location.href = "/";
</script>
@else
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
            <li class="breadcrumb-item active" aria-current="page">Nuevo consultorio</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Crear nuevo consultorio</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con los datos correctos del consultorio</h5>
                <form action="{{route('actualizar_consultorio')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($consultorioE as $consultorio)
                    <input type="text" name="id" hidden value="{{$consultorio->id_consultorio}}">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Numero del consultorio</label>
                        <input type="text" class="form-control" placeholder="Ingresa el numero de tu consultorio"
                            name="numero_de_consultorio" value="{{$consultorio->numero_de_consultorio}}" id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Especialidad (No Seleccione ninguna si quieres que se quede igual):</label>
                        <select name="id_especialidad" id="id_especialidad" class="form-control">
                            <option value="0">Seleccione una Especialidad</option>
                            @foreach($especialidades as $especialidad)
                            <option value="{{$especialidad-> id_especialidad}}"> {{$especialidad->nombre_especialidad}}
                            </option>
                            @endforeach
                        </select>
                        <input type="text" name="especialidad" id="" value="{{$consultorio->id_especialidad}}" hidden>
                    </div>
                    <input type="text" name="estatus" value="Activo" hidden>

                    <div id="enviar">
                        <input type="submit" value="Guardar consultorio" class="btn_apt">
                    </div>
                    @endforeach
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