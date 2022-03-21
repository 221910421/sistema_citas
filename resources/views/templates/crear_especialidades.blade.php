@extends('templates-layouts.headerandfooter')
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
            <li class="breadcrumb-item active" aria-current="page">Registrarse</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Crear nueva especialidad</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con los datos de la nueva especialidad</h5>
                <form action="{{route('guardar_especialidad')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre de la especialidad*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la nueva especialidad" name="nombre"
                            id="recipient-name" required="">
                    </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Precio:</label>
                            <input type="text" class="form-control" maxlength="6" placeholder="Ingresa el precio" name="precio"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Numero de Consultorio:*</label>
                            <input type="text" class="form-control" maxlength="2" placeholder="Ingresa el numero de consultorio"
                                name="numero_consultorio">
                        </div>
                        
                        <div id="enviar">
                            <input type="submit" value="Guardar nueva especialidad" class="btn_apt">
                        </div>
                </form>
            </div>
            <div class="clerafix"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function comprobarpass() {
        var pass = document.getElementById('contraseña').value;
        var confirmpass = document.getElementById('confirmcontraseña').value;
        if (pass == confirmpass) {
            $("#error").empty();
            $("#enviar").html('<input type="submit" value="Guardar nueva especialidad" class="btn_apt">');
        }else {
            $("#error").html('<label style="color: red;">Las contraseñas deben ser iguales</label>');
            $("#enviar").html('<input type="submit" value="Guardar nueva especialidad" disabled class="btn_apt">');
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