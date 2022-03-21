<html>

<body>

	<head>
		<title>AGENDA CLÍNICA DIGITAL.</title>
		<!-- Meta tag Keywords -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8" />
		<meta name="keywords"
			content="Medic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!--// Meta tag Keywords -->

		<!-- Custom-Files -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Bootstrap-Core-CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<!-- Style-CSS -->
		<link rel="stylesheet" href="css/fontawesome-all.css">
		<!-- Font-Awesome-Icons-CSS -->
		<!-- //Custom-Files -->

		<!-- Web-Fonts -->
		<link
			href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
			rel="stylesheet">
		<link
			href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
			rel="stylesheet">
		<!-- //Web-Fonts -->

	</head>

	<body>
		<!-- header -->
		<header>
			<!-- top-bar -->
			<div class="top-bar py-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 top-social-agile">
							<div class="row">
								<!-- social icons -->
								<ul class="col-lg-4 col-6 top-right-info text-center">
									<li>
										<a href="https://www.facebook.com/UNEVT.Edomex">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li class="mx-3">
										<a href="https://twitter.com/UNEVTOficial">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
								</ul>
								<!-- //social icons -->
								<div class="col-6 header-top_w3layouts pl-3 text-lg-left text-center">
									<p class="text-white">
<<<<<<< HEAD
										<i class="fas fa-map-marker-alt mr-2"></i>Av.Miguel Hidalgo,Bo.San Miguel. San Mateo Atenc, Méx. <!--cambiar-->
=======
										<i class="fas fa-map-marker-alt mr-2"></i>Acueducto del Alto Lerma Pedregal de
										Guadalupe Hidalgo, Méx.
										<!--cambiar-->
>>>>>>> dc13007175f59de77272a6535ef2eb36cc6b6427
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-5 top-social-agile text-lg-right text-center">
							<div class="row">
								<div class="col-lg-7 col-6 top-w3layouts">
									<p class="text-white">
										<i class="fas fa-globe"></i>
										<a href="" class="text-white">Nuestro Sitio Web</a>
									</p>
								</div>
								<div class="col-lg-5 col-6 header-w3layouts pl-4 text-lg-left">
									<p class="text-white">
										<i class="fas fa-phone mr-2"></i><a href="tel:7282878382"
<<<<<<< HEAD
											style="color:#FFF;">7221209216</a><!--Cambiar-->
=======
											style="color:#FFF;">7282878382</a>
										<!--Cambiar-->
>>>>>>> dc13007175f59de77272a6535ef2eb36cc6b6427
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- //top-bar -->
		<div id="home">
			<!-- navigation -->
			<div class="main-top py-1">
				<nav class="navbar navbar-expand-lg navbar-light fixed-navi">
					<div class="container">
						<!-- logo -->
						<h1>
							<a class="navbar-brand font-weight-bold font-italic" href="{{route('index')}}">
								<img style="width: 69px;height: 69px;" src="images/logo.png">
								<span>Clínica</span>Integral
								<i class="fas fa-hospital"></i>
							</a>
						</h1>
						<!-- //logo -->
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
							<ul class="navbar-nav ml-lg-auto">
								<li class="nav-item active mt-lg-0 mt-3">
									<a class="nav-link" href="{{route('index')}}">Inicio
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="nav-item mx-lg-4 my-lg-0 my-3">
									<a class="nav-link" href="">Acerca de Nosotros</a>
								</li>
								<li class="nav-item mx-lg-4 my-lg-0 my-3">
									<a class="nav-link" href="">Conócenos</a>
								</li>
								@if(empty(session('session_id')))
								<li class="nav-item mx-lg-4 my-lg-0 my-3">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Citas</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">

										<a class="dropdown-item" href="#">inicia sesión</a>
									</div>
								</li>
								</li>
								<!-- login -->
								<li class="nav-item mx-lg-4 my-lg-0 my-3">
									<a href="#" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3"
										data-toggle="modal" data-target="#exampleModalCenter1">
										<i class="fas fa-sign-in-alt mr-2"></i>Ingresar</a>
								</li>
								@else
								<li class="nav-item mx-lg-4 my-lg-0 my-3">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Citas</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="">Agendar Cita</a>
										<a class="dropdown-item" href="">Mis citas</a>
									</div>
								</li>
								</li>
								<li class="nav-item mx-lg-4 my-lg-0 my-3">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sesión de
										{{session('session_name')}} <img class="foto_perfil"
											src="images/user/{{session('session_foto')}}" alt="Foto de perfil"
											width="50" height="50"></a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{route('misdatos')}}">Mis datos</a>
										<a class="dropdown-item" href="{{route('salir')}}">Cerrar sesión</a>
									</div>
								</li>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<!-- //navigation -->
			<!-- modal -->
			<!-- login -->
			<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header text-center">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="login px-4 mx-auto mw-100">
								<h5 class="text-center mb-4">Inicia ahora</h5>
								<form action="{{route('login')}}" method="post">
									@csrf
									<div class="form-group">
										<label>Correo</label>
										<input type="mail" class="form-control" name="correo"
											required="">
									</div>
									<div class="form-group">
										<label class="mb-2">Contraseña</label>
										<input type="password" class="form-control" name="contraseña" placeholder=""
											required="">
									</div>
									<button type="submit" class="btn submit mb-4">Iniciar sesión</button>
								</form>
								<form action="{{route('crear_usuario')}}" method="get">
									<button type="submit" class="btn submit mb-4">Registarse</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@yield('body')
		<!-- footer -->
		<footer>
			<div class="w3ls-footer-grids pt-sm-4 pt-3">
				<div class="container py-xl-5 py-lg-3">
					<div class="row">
						<div class="col-md-4 w3l-footer">
							<h2 class="mb-sm-3 mb-2">
								<a href="{{route('index')}}" class="text-white font-italic font-weight-bold">
									<span>Clínica</span>Integral
									<i class="far fa-hospital"></i>
								</a>
							</h2>
							<p align="eft">En nuestra clínica queremos servir a todos aquellos que requieran de algún
								servicio de los que tengamos disponibles y nos complacerá recibirlos nuevamente en esta
								su
								clínica.</p>
						</div>
						<div class="col-md-4 w3l-footer my-md-0 my-4">
							<h3 class="mb-sm-3 mb-2 text-white">Dirección</h3>
							<ul class="list-unstyled">
								<li>
									<i class="fas fa-location-arrow float-left"></i>
									<!--<p class="ml-4">Acueducto del Alto Lerma Pedregal de Guadalupe Hidalgo, Méx.</p>-->
									<div class="clearfix"></div>
								</li>
								<li class="my-3">
									<i class="fas fa-phone float-left"></i>
									<p class="ml-4"></p>
									<div class="clearfix"></div>
								</li>
								<li>
									<i class="fas fa-globe"></i>
									<!--<a href="" class="text-white">Nuestro Sitio Web</a>-->
									<div class="clearfix"></div>
								</li>
							</ul>
						</div>
						<div class="col-md-4 w3l-footer">
							<h3 class="mb-sm-3 mb-2 text-white">Enlaces Rápidos</h3>
							<div class="nav-w3-l">
								<ul class="list-unstyled">
									<li>
										<a href="{{route('index')}}">Inicio</a>
									</li>
									<li class="mt-2">
										<a href="">Acerca de Nosotros</a>
									</li>
									<!--<li class="mt-2">
									<a href="gallery.html">Gallery</a>
								</li>-->
									<li class="mt-2">
										<a href="">Agendar Cita</a>
									</li>
									<li class="mt-2">
										<a href="">Conocenos</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="border-top mt-5 pt-lg-4 pt-3 pb-lg-0 pb-3 text-center">
						<p class="copy-right-grids mt-lg-1">2022 AGENDA CLÍNICA DIGITAL. Todos los derechos reservados
						</p>
					</div>
				</div>
			</div>
		</footer>
		<!-- //footer -->
	</body>

</html>