<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Administrador</title>
                <!--contenido css-->
                <link rel="stylesheet" href="../css/contenido.css"/>
		<!-- Bootstrap CSS -->
                <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet">
                <script src="menu.js"></script>
	</head>
	<body>

			<div class="container">
			<!--Encabezado -->
				<div class="page-header">
				<div class="row">
				<div class="col-sm-5 col-md-3">
					<img src="../img/logo_OSH.png" height="451" width="300" class="img-responsive" alt="Image">
				</div>
					<div class="col-sm-6 col-md-6">
					<h1>Cerberus	<br>	<small>Sistema de control de acceso</small></h1>

					</div>
				</div>
				</div><!--Fin Encabezado-->

					<!--Barra de navegacion-->
				<nav class="navbar navbar-default" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Administrador</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Link</a></li>
                               <li><a onclick="CambiarContenido('#contenido','Registro_Usuario.php')" href="#">Registrar</a></li>
						</ul>

						 <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">cerrar seción <span class="glyphicon glyphicon-log-out"></span> </a></li>

                </ul>
					</div><!-- /.navbar-collapse -->
				</nav><!-- Fin Barra de navegación-->

			<div id="contenido"><!--Inicio Contenido-->

			</div><!--Fin Contenido-->

			<div class="footer">	<!--Inicio pie de pagina-->
			<div class="row">
				<div class=" col-md-2">
					<img src="../img/OSH-LOGO-FONDO-TRANSPAR-RUEDA.png" class="img-responsive" alt="Responsive image">
				</div>
					<div class="col-md-6">
					<p><h1>Pie de pagina	<br>	<small>Sistema de control de acceso</small></h1></p>

					</div>
				</div>

			</div><!--Fin pie de pagina-->



</div>





		<!-- jQuery -->

                <script src="../js/jquery-1.10.2.js"></script>
		<!-- Bootstrap JavaScript -->
                <script src="../bootstrap_js/bootstrap.min.js"></script>
	</body>
</html>