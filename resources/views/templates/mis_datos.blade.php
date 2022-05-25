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
            <li class="breadcrumb-item active" aria-current="page">Registrarse</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Estos son tus datos</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Si deseas modificar los datos de tu usuario por favor escribe tu
                    contraseña al final para habilitar el botón modificar</h5>
                <form action="{{route('actualizar_datos')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach ($mis_datos as $dato)
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="nombre"
                            id="recipient-name" required="" value="{{$dato->nombre}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu apellido paterno"
                            name="apellido_paterno" id="recipient-name" value="{{$dato->apellido_paterno}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu apellido materno"
                            name="apellido_materno" id="recipient-name" value="{{$dato->apellido_materno}}" required="">
                    </div>
                    @if($dato->genero == "Mujer")
                    <div class="form-group">
                        <p>Género:</p>
                        <input type="radio" id="Masculino" value="Hombre"  name="genero"><label
                            class="col-form-label">Masculino</label>
                        <input type="radio" id="Femenino" value="Mujer" checked name="genero"><label
                            class="col-form-label">Femenino</label>
                        <div class="form-group">
                            @elseif($dato->genero == "Hombre")
                            <div class="form-group">
                                <p>Género:</p>
                                <input type="radio" id="Masculino" value="Hombre" checked name="genero"><label
                                    class="col-form-label">Masculino</label>
                                <input type="radio" id="Femenino" value="Mujer" name="genero"><label
                                    class="col-form-label">Femenino</label>
                                <div class="form-group">
                                    @endif
                                    <label for="recipient-name" class="col-form-label">Edad*:</label>
                                    <input type="text" maxlength="2" pattern="[0-9]{2}" class="form-control"
                                        placeholder="Ingresa tu edad" name="edad" required="" value="{{$dato->edad}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Foto*:</label>
                                    <input type="file" class="form-file" name="foto" accept="image/*"
                                        value="{{$dato->foto}}" type="file">
                                </div>
                                <input type="text" value="{{$dato->foto}}" hidden readonly name="foto_original">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Calle*:</label>
                                    <input type="text" class="form-control" placeholder="Ingresa tu calle" name="calle"
                                        required="" value="{{$dato->calle}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Numero:</label>
                                    <input type="text" class="form-control" pattern="[0-9]{2}"
                                        placeholder="Ingresa el número de tu dirección, (Dejar vacio si no cuenta con número)"
                                        name="numero" maxlength="4" minlength="2" value="{{$dato->numero}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Codigo postal:*</label>
                                    <input type="text" class="form-control" maxlength="5"
                                        placeholder="Ingresa tu codigo postal" name="cp"
                                        value="{{$dato->codigo_postal}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Municipio:*</label>
                                    <input type="text" class="form-control" placeholder="Ingresa tú municipio"
                                        name="municipio" value="{{$dato->municipio}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Telefono:*</label>
                                    <input type="text" class="form-control" pattern="[0-9]{10}"
                                        placeholder="Ingresa tú número de telefono" name="telefono" id="recipient-phone"
                                        value="{{$dato->telefono}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Correo*:</label>
                                    <input type="email" class="form-control"
                                        placeholder="Verifica el correo antes de enviar" name="correo" required=""
                                        value="{{$dato->correo}}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="contraseña" id="contraseña"
                                        value="{{$contraseña}}" hidden required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Contraseña*:</label>
                                    <input type="password" class="form-control" name="confirmarcon"
                                        id="confirmcontraseña" required onkeyup="comprobarpass()">
                                    <div id="error">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">CURP:*</label>
                                    <input type="text" class="form-control" minlength="13" maxlength="13"
                                        placeholder="Ingresa el número de tu dirección, (Dejar vacio si no cuenta con número)"
                                        name="rfc" value="{{$rfc}}">
                                </div>
                                <div id="enviar">
                                    <input type="submit" value="Actualizar mis datos" class="btn_apt">
                                </div>
                </form>
                @endforeach
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
            $("#enviar").html('<input type="submit" value="Actualizar mis datos" class="btn_apt">');
        } else {
            $("#error").html('<label style="color: red;">Debes ingresar tu contraseña correcta para poder editar tú información</label>');
            $("#enviar").html('<input type="submit" value="Actualizar mis datos" disabled class="btn_apt">');
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