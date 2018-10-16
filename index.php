<?php 
/*
$_SESSION['loggedIn'] = false;

if(!$_SESSION['loggedIn'])
 	header('Location: ../index.php');
*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap Theme Example</title>



	<link href='https://fonts.googleapis.com/css?family=Lora:400,400italic|Work+Sans:300,400,500,600' rel='stylesheet' type='text/css'>
	<link href="assets/css/toolkit-startup.css" rel="stylesheet">
	<link href="assets/css/application-startup.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      /* …curses ios, etc… */
      @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
        body {
          width: 1px;
          min-width: 100%;
          *width: 100%;
        }
        #stage {
          height: 1px;
          overflow: auto;
          min-height: 100vh;
          -webkit-overflow-scrolling: touch;
        }

        #sidebar{
        	overflow: auto;
        	-webkit-overflow-scrolling: touch;	
        }
      }
    </style>

  </head>
  <body>

	
	<div class="stage-shelf stage-shelf-right hidden" id="sidebar">
		<ul class="nav nav-bordered nav-stacked flex-column">
			<li class="nav-header">Menú</li>
			<li class="nav-item">
				<a class="nav-link active" href="index.php">Inicio</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#Productos">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tienda/tienda.php">Tienda</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="acceder.php">Acceder</a>
			</li>  
			<li class="nav-divider"></li>
			<li class="nav-header">Info</li>
			<li class="nav-item">
				<a class="nav-link" href="contacto.php">Contacto</a>
			</li> 
			<li class="nav-item">
				<a class="nav-link" href="acerca-de.php">Acerca de</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="politicas.php">Políticas</a>
			</li> 
		</ul>
	</div>

	<div class="stage" id="stage">

		<div class="block block-inverse block-fill-height app-header" style
		="background-image: url(assets/img/header-bg.jpg);">


			<div class="container py-4 fixed-top app-navbar">
				<nav class="navbar navbar-transparent navbar-padded navbar-toggleable-sm">
					<button
					class="navbar-toggler navbar-toggler-right hidden-md-up"
					type="button"
					data-target="#stage"
					data-toggle="stage"
					data-distance="-250">
						<span class="navbar-toggler-icon"></span>
					</button>


					<a class="navbar-brand mr-auto" href="">
						<img src="images/dymosa-logo-trans.png" width="80px" height="55px" style="background: #fff;  padding: 0px; border-radius:4px;">
					</a>

					<div class="hidden-sm-down text-uppercase">
						<ul class="navbar-nav">
							<li class="nav-item px-1 ">
								<a class="nav-link" href="#">Inicio</a>
							</li>
							<li class="nav-item px-1 ">
								<a class="nav-link" href="#Productos">Productos</a>
							</li>
							<li class="nav-item px-1 ">
								<a class="nav-link" href="tienda/tienda.php">Tienda</a>
							</li>
							<li class="nav-item px-1 ">
								<a class="nav-link" href="contacto.php">Contacto</a>
							</li>
							<li class="nav-item px-1 ">
								<a class="nav-link" href="acerca-de.php">Acerca de</a>
							</li>
							<li class="nav-item px-1 ">
								<a class="nav-link btn btn-outline-secondary" href="acerca-de.php">Acceder</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>


			<div class="block-xs-middle pb-5">
				<div class="container pt-5">
					<div class="row align-items-center">
						<div class="col-sm-6 col-lg-6">
							<h1 class="block-titleData frequency" style="font-size: 2.0rem">Las mejores etiquetadoras del mercado</h1>
							<p class="lead mb-4 text-muted">Nunca fue más fácil etiquetar tus productos</p>
							<a class="btn btn-success btn-lg" href="tienda/tienda.php">Ir a la tienda</a>
						</div>
						<div class="col-sm-6 col-lg-6 mt-5">
							<img src="images/gallery/5.png" class="img-fluid float-right hidden-sm-down" width="380px" alt="Etiquetadora-gris">
						</div>
					</div>
				</div>
			</div>



		</div>

		<div class="block block-secondary app-iphone-block">
			<div class="container">
				<div class="row app-align-center">

					<div class="col-sm-5 hidden-sm-down">
						<img class=" float-left" src="assets/img/bussinesswoman.jpg" style="width: 100%;">
					</div>

					<div class="col-md-6 offset-md-1 col-sm-12 offset-sm-0">
						<h6 class="text-muted text-uppercase">Regístrate</h6>
						<h3>¿Aún no estás con nosotros?</h3>
						<p class="lead mb-4">Te permitimos crear una cuenta para poder llevar a cabo tus pedidos en nuestra <a href="#" class="text-primary">tienda online</a>.</p>
						<div class="row hidden-md-down">
							<div class="col-sm-6 mb-3">
								<h5>Regístrate</h5>
								<p>Sólo te llevará 2 minutos. No, menos... 5 minutos.</p><br>
								<a class="btn btn-success"href="tienda/registro.php">Regístrate</a>
							</div>
							<div class="col-sm-6">
								<h5>Inicia sesión</h5>
								<p>¿Ya eres parte de la tienda?<br>Ingresa ahora mismo a ver nuestros productos más recientes.</p>
								<a class="btn btn-primary"href="tienda/acceso.php">Inicia sesión</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="block">
			<div class="container text-center">

				<div class="row mb-5">
					<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
						<h2 class="text-muted text-uppercase mb-2">¿Qué ofrecemos?</h2>
						<h3>Te ofrecemos el servicio que otras empresas se niegan a darte.</h3>
					</div>
				</div>

				<div class="row align-items-center justify-content-center">
					<div class="col-md-6 px-5 pb-2 mb-5">
							<div class="px-2 mb-2">
								<h4 class="text-muted text-uppercase mb-4">Productos</h4>
								<img class="mb-1" src="assets/img/startup-10.svg">
								<p class="pb-2">Te ofrecemos una gran cantidad de productos.</p>
							</div>

							<ul class="list-unstyled list-bordered text-xs-left my-4">
								<li class="py-4"><strong>Etiquetadoras</strong></li>
								<li class="py-4"><strong>Ribbon</strong></li>
								<li class="py-4">Fabricación de <strong>etiquetas</strong></li>
							</ul>

							<button class="btn btn-lg btn-primary btn-block">
								Ir a la tienda
							</button>
					</div>

					<div class="col-md-6 px-5 pb-2 mb-5 ">
							<div class="px-2">
								<h4 class="text-muted text-uppercase mb-4">Servicio</h4>
								<img class="mb-1" src="assets/img/startup-9.svg">
								<p class="pb-2">Reparamos tus máquinas. Nosotros vamos a usted.</p>
							</div>

							<ul class="list-unstyled list-bordered text-xs-left my-4">
								<li class="py-4">Damos <strong>mantenimiento</strong></li>
								<li class="py-4">Nosotros vamos a su empresa</li>
								<li class="py-4">Contáctanos por nuestro <strong>teléfono</strong> o <strong>chat</strong></li>
							</ul>

							<button class="btn btn-lg btn-primary btn-block">
								Ponerse en contacto
							</button>
					</div>

				</div>

			</div>
		</div>

	

		<div class="block block-inverse app-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 mb-5">
						<ul class="list-unstyled list-spaced">
							<li class="mb-2"><h6 class="text-uppercase">Acerca de</h6></li>
							<li class="text-muted">
								En Distribuidora y Mayorista Omega, con más de 30 años de experiencia, nos dedicamos a brindarles a nuestros clientes un servicio cordial. Valoramos su negocio. Nuestra misión es ofrecer productos y servicios confiables con un enfoque orientado al cliente.
							</li>
						</ul>
					</div>
					<div class="col-md-3 offset-md-1 mb-5">
						<ul class="list-unstyled list-spaced">
							<li class="mb-2"><h6 class="text-uppercase">Contácto</h6></li>
							<li class="text-muted">(55) 5650-2369</li>
							<li class="text-muted">(55) 5654-1001</li>
							<li class="text-muted">(55) 5657-6210</li>
							<li class="text-muted">(55) 5650-2873</li>
						</ul>
					</div>
					<div class="col-md-2 mb-5">
						<ul class="list-unstyled list-spaced">
							<li class="mb-2"><h6 class="text-uppercase">Redes</h6></li>
							<li class="text-muted">Facebook</li>
							<li class="text-muted">Instagram</li>
							<li class="text-muted">Youtube</li>
							<li class="text-muted">Twitter</li>
						</ul>
					</div>
					<div class="col-md-2 mb-5">
						<ul class="list-unstyled list-spaced">
							<li class="mb-2"><h6 class="text-uppercase">Legal</h6></li>
							<li class="text-muted">Términos</li>
							<li class="text-muted">Legal</li>
							<li class="text-muted">Privacidad</li>
							<li class="text-muted">Licencia</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/tether.min.js"></script>
	<script src="assets/js/toolkit.js"></script>
	<script src="assets/js/application.js"></script>
  </body>
</html>



<!--
<?php /*$paginaActual = "Inicio"; 

include('includes/topHtml.php'); ?>

<body>
	<?php include('includes/header.php'); ?>


	<section id="section-presentacion">

		<span class="titulo-principal">Las mejores etiquetadoras del mercado</span> <br><br>

		<p class="titulo-comentario">Nunca fue más fácil etiquetar tus productos</p>

		<img id="etiquetadora-principal" src="images/etiquetadora-roja.png"> <br>
		<a href="productos.php"><button class="boton-verde" value="Login"><img id="icon-tienda" src="images/tienda.png"/><span id="boton-texto-tienda">Ir a la tienda</span></button></a>
		
	</section>


	<?php include('includes/footer.php'); ?>

	<?php include('includes/bottomHtml.php'); */?>
	
</body>
</html>