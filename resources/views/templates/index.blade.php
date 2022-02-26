@extends('templates-layouts.headerandfooter')
@section('body')
<!-- banner -->
<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="banner-top1">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3>Sevicios Clinicos
									<span>de calidad</span>
								</h3>
								<p class="mt-3 mb-md-5 mb-3">Conoce nuestros servicios.</p>
								<a href="">Saber más.
									<i class="fa fa-caret-right ml-2" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top2">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3>Personal de excelencia
									<span>todos los días</span>
								</h3>
								<p class="mt-3 mb-md-5 mb-3">Contamos con diferentes horarios de atención.</p>
								<a href="appointment.html">Agenda tu Cita.
									<i class="fa fa-caret-right ml-2" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top3">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3>Una clínica al alcance
									<span>de todos</span>
								</h3>
								<p class="mt-3 mb-md-5 mb-3">Estamos aún más cerca de ti.</p>
								<a href="">Conócenos. 
									<i class="fa fa-caret-right ml-2" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- //banner -->
	<div class="clearfix"></div>
	<!-- //banner bottom ---->

	<!-- middle section -->
	<div class="w3ls-welcome py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="row">
				<div class="col-lg-5 welcome-right">
					<img src="images/b2.png" alt=" " class="img-fluid">
				</div>
				<div class="col-lg-7 welcome-left mt-4">
					<h3>Nos adaptamos a la nuevas medidas de higiene</h3>
					<h6 class="mt-3">Al momento de llegar contamos con varios filtros de sanidad</h6>
					<h4 class="my-4 font-italic">Estamos seguros de que si nos cuidamos, podremos salir adelante de esta situación, juntos.</h4>
					<p></p>
				</div>
			</div>
		</div>
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