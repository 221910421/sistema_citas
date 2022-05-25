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
<!-- page details -->
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Crear cita</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var refreshId = setInterval(function () {
            $('#sesion').load("{{route('verificar_sesion')}}");
        }, 500);
    });
</script>
            <h3 class="title">Crear mi cita {{session('session_name')}} {{session('session_ap')}}</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar correctamente los datos de tu cita</h5>
                <form action="{{route('guardar_cita')}}" method="post">
                    @csrf
                    <div class="form-group" id="especialidades">
                        <label for="recipient-name" class="col-form-label">Especialidad*:</label>
                        <select name="especialidad" id="especialidad" required class="form-control" required>
                            <option value="0">Seleccione una especialidad</option>
                            @foreach($especialidades as $especialidad)
                            <option value="{{$especialidad->id_especialidad}}">{{$especialidad->nombre_especialidad}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="consultorios">
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label>
                        <select name="consultorio" id="consultorio" disabled class="form-control" required onchange="restaturarfecha()">
                            <option value="0">Selecciona una especialidad antes</option>
                        </select>
                    </div>
                    <div class="form-group" id="fechas">
                        <label for="recipient-name" class="col-form-label">Fecha*:</label>
                        <input type="date" min="{{$next_date}}" name="fecha" id="fecha" class="form-control" required onchange="comprobarHora()">
                    </div>
                    <div class="form-group" id="horarios">
                        <label for="recipient-name" class="col-form-label">Hora de la cita*:</label>
                        <select name="hora" id="hora" class="form-control" required>
                            <option value="">Selecciona la hora de su cita</option>
                        </select>
                    </div>
                    <div id="enviar">
                        <input type="submit" value="Agendar cita" class="btn_apt">
                    </div>
                </form>
            </div>
            <div class="clerafix"></div>
        </div>
    </div>
</div>


<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#especialidad").change(function () {
            var valespecialidad = $("#especialidad").val();
            if (valespecialidad == 0) {
                $('#consultorios').html('<label for="recipient-name" class="col-form-label">Consultorio*:</label><select name="consultorio" id="consultorio" disabled class="form-control" required><option value="0">Selecciona una especialidad antes</option></select>');
                $('#fechas').html('<label for="recipient-name" class="col-form-label">Fecha*:</label><input type="date" min="{{$next_date}}" name="fecha" id="fecha" class="form-control" value="" required onchange="comprobarHora()">');
            }
            else {
                $('#consultorios').empty();
                $("#consultorios").load("{{ route('consultorios_cita')}}?id_especialidad=" + valespecialidad).serialize();
                $('#fechas').html('<label for="recipient-name" class="col-form-label">Fecha*:</label><input type="date" min="{{$next_date}}" name="fecha" id="fecha" class="form-control" value="" required onchange="comprobarHora()">');
            }
        });
    })

</script>

<script type="text/javascript">
    function comprobarHora() {
        var especialidad = $('#especialidad').val();
        var consultorio = $('#consultorio').val();
        if(especialidad == 0 && consultorio == 0){
            alert ("Seleccione una especialidad y un consultorio antes");
            $('#fechas').html('<label for="recipient-name" class="col-form-label">Fecha*:</label><input type="date" name="fecha" id="fecha" class="form-control" value="" required onchange="comprobarHora()">');
        }else{
            if(especialidad == 0){
                alert ("Seleccione una especialidad antes");
            $('#fechas').html('<label for="recipient-name" class="col-form-label">Fecha*:</label><input type="date" name="fecha" id="fecha" class="form-control" value="" required onchange="comprobarHora()">');
            }else{
                if(consultorio == 0){
                alert ("Seleccione un consultorio antes");
            $('#fechas').html('<label for="recipient-name" class="col-form-label">Fecha*:</label><input type="date" name="fecha" id="fecha" class="form-control" value="" required onchange="comprobarHora()">');
            }else{
                var fecha = $('#fecha').val();
                $('#horarios').empty();
                $("#horarios").load("{{route('horarios_cita')}}?especialidad=" + especialidad + "&consultorio=" + consultorio + "&fecha=" + fecha).serialize();
            }
        }
    }
}
</script>



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