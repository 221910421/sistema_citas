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
<br>
<center><h1>Pago de Consulta Medica</h1><br>


<a href="{{route('proceso_pago')}}">Pagar Consulta
    <img align="right" width="100" height="100" src="images/paypal.jpg">
    </a>
    
</center>
<div id="sesion">

</div>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    function comprobarHora() {
        var campo = $("#campo").val();
        var terminob = document.getElementById("buscar").value;
        num = 0;

        if(campo == ""){
            alert("Seleccione un termino de busqueda y vuelva a intentar");
            document.getElementById("buscar").value="";
        }else{
            $('#table-content').html("<div style='display: flex; justify-content: center; align-items: center;'><progress max='100' value='100'></progress></div><br> <h2 style='text-align: center;'>Cargando 100% </h2>");
            $('#table-content').load("{{route('busqueda_tiempo_real')}}?termino=" + terminob + "&campo=" + campo).serialize();
    }
}
</script>

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


<script>
    function cancelado() {
        alert("Ya se ha cancelado la cita anteriormente");
    }
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




