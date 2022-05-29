@extends('templates-layouts.headerandfooter')
@section('body')
<div class="inner-banner-w3ls">
    <div class="container">

    </div>
    <!-- //banner 2 -->
</div>
<center>
    <h1>¿Cómo has llegado aquí?, No tienes autorización para ver esta página nos vemos</h1>
    <p>----error 401----</p>
    <h2>No autorizado</h2>
    <img src="https://th.bing.com/th/id/R.4fae88083a5963f3742bc8db5b96bd31?rik=AHGx7ppufbXJ5w&pid=ImgRaw&r=0" alt=""
        width="200px">
</center>



<!-- Js files -->
<!-- JavaScript -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Default-JavaScript-File -->
<script>
    $(document).ready(function () {
        var refreshId = setInterval(function () {
            window.location.href="/";
            }, 5000);
    });
</script>
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