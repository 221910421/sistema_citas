@extends('templates-layouts.headerandfooter')
@if(empty(session('session_idtemp')))
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
<h1>Verificar correo electronico</h1>
    <h3>Para poder disfrutar de nuestros servicio por favor verifica tu correo electronico</h3>
    <form action=" {{ route('verificar_correo') }} " method="post">
        @csrf
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Código de verificación*:</label>
            <input type="tel" class="form-control" placeholder="Ingresa tu código de verificación" name="codigo"
                id="recipient-name" required="">
        </div>
        <input type="submit" value="Verificar">
    </form>
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