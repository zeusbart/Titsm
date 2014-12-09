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
	</head>
	<body>

			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Administrador</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
						</ul>
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">Link</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>

				<div class="row">
					<div class="col-md-3">
						Nombre;
					</div>
					<div class="col-md-4">
						<input type="text" name="nombre" id="inputNombre" class="form-control" value="" required="required" pattern="" title="">
					</div>
				</div>




</div>
<div id="logo">

			</div>

				<!--	<div id="logo">
				<div class="col-xs-5 col-sm-7 col-md-8 col-lg-12">
				 <img src="../img/OSH-LOGO-FONDO-TRANSPAR-RUEDA.png" class="img-responsive" alt="Responsive image">
				</div>
					 </div>-->

		<!-- jQuery -->
                <script src="../js/jquery-1.10.2.js"></script>
		<!-- Bootstrap JavaScript -->
                <script src="../bootstrap_js/bootstrap.min.js"></script>
	</body>
</html>