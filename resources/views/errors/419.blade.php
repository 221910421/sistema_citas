@extends('templates-layouts.headerandfooter')
@section('body')
<div class="inner-banner-w3ls">
    <div class="container">

    </div>
    <!-- //banner 2 -->
</div>
<center>
    <h1>La página expiro, te retornaremos de nuevo a la antigua página para que puedas terminar tus cosas</h1>
    <p>----error 419----</p>
    <h2>Página expirada</h2>
    <img src="https://media.istockphoto.com/vectors/cartoon-image-of-broken-robot-vector-id670383078" alt=""
        width="200px">
</center>



<!-- Js files -->
<!-- JavaScript -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Default-JavaScript-File -->
<script>
    $(document).ready(function () {
        var refreshId = setInterval(function () {
            history.go(-1) ;
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