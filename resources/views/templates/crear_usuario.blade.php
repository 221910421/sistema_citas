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
            <li class="breadcrumb-item active" aria-current="page">Crear nuevo usuario</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Crear nuevo paciente</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con los datos del nuevo usuario</h5>
                <form action="{{route('guardar_usuario')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="nombre"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu apellido paterno" name="apellido_paterno"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu apellido materno" name="apellido_materno"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                            <p>Género:</p>
                            <input type="radio" id="Masculino" value="Hombre" checked name="genero"><label
                                class="col-form-label">Masculino</label>
                            <input type="radio" id="Femenino" value="Mujer" name="genero"><label
                                class="col-form-label">Femenino</label>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Edad*:</label>
                        <input type="number" maxlength="2" class="form-control" placeholder="Ingresa tu edad"
                            name="edad" id="recipient-phone" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Foto*:</label>
                        <input type="file" class="form-control" 
                            name="foto" id="recipient-phone" required="">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Calle*:</label>
                      <input type="text" class="form-control" placeholder="Ingresa tu calle"
                          name="calle" id="recipient-phone" required="">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Numero:</label>
                    <input type="number" class="form-control" maxlength="3" placeholder="Ingresa el número de tu dirección, (Dejar vacio si no cuenta con número)"
                        name="numero" id="recipient-phone">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Codigo postal:*</label>
                  <input type="text" class="form-control" maxlength="5" placeholder="Ingresa tu codigo postal"
                      name="cp" id="recipient-phone">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Municipio:*</label>
                <input type="text" class="form-control"  placeholder="Ingresa tú municipio"
                    name="municipio" id="recipient-phone">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Telefono:*</label>
              <input type="number" class="form-control" maxlength="10" placeholder="Ingresa el número de tu dirección, (Dejar vacio si no cuenta con número)"
                  name="telefono" id="recipient-phone">
          </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Correo*:</label>
                        <input type="email" class="form-control" placeholder="Verifica el correo antes de enviar"
                            name="correo" id="recipient-phone" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña*:</label>
                        <input type="password" class="form-control" name="contraseña" id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Verifica tu contraseña*:</label>
                      <input type="password" class="form-control" name="confirmarcon" id="recipient-name" required="">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">RFC:*</label>
                    <input type="text" class="form-control" minlength="13" maxlength="13" placeholder="Ingresa el número de tu dirección, (Dejar vacio si no cuenta con número)"
                        name="rfc" id="recipient-phone">
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
