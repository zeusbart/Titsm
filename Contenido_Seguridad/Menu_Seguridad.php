<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
$IDUsuarios = $_SESSION['IDUsuarios'];
$Nombre = $_SESSION['Nombre'];
$Appat = $_SESSION['Appat'];
$Apmat = $_SESSION['Apmat'];
$Tipo_Usuario = $_SESSION['Tipo_Usuario'];
if ($Tipo_Usuario != 2) {
    session_destroy();
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguridad</title>
        <!--contenido css-->
        <link rel="stylesheet" href="../css/contenido.css"/>
        <!-- Bootstrap CSS -->
        <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery-1.10.2.js"></script>
        <!--jquery dataTable-->
        <script src="../media/js/jquery.dataTables.min.js"></script>
        <!--css extencion dataTable bootstrap-->
        <link href="../media/css/dataTables.bootstrap.css" rel="stylesheet">
        <!--Extencion dataTable responsivo css-->
        <link href="../media/css/dataTables.responsive.css" rel="stylesheet">
        <!--dataTable Responsivo script-->
        <script src="../media/js/dataTables.responsive.min.js"></script>
        <!--Extencion bootstrap dataTable js-->
        <script src="../media/js/dataTables.bootstrap.js"></script>
        <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>-->
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
                    <div class="col-sm-6 col-md-3">
                        <p class="nusuario">
<?php echo "Usuario: " . $Nombre . " " . $Appat . " " . $Apmat; ?>
                        </p>
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
                    <a class="navbar-brand" onclick="CambiarContenido('#contenido', 'Principal.php')" href="#"><span class="glyphicon glyphicon-user"></span>
                        &nbsp;Guardias
                    </a>
                   
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!--<li><a onclick="CambiarContenido('#contenido','ESPersonal.php')" href="#">Acceso Personal</a></li>-->
                        <li><a onclick="CambiarContenido('#contenido', 'ESEquipo.php')" href="#">Acceso Personal/Equipo</a></li>
                        <li><a onclick="CambiarContenido('#contenido', 'Cambiar_Contrasena.php')" href="#">Cambiar Contraseña</a></li>
                        <li><a href="#" onclick="CambiarContenido('#contenido','Anotaciones.php')" >Anotaciones</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../Salir.php">cerrar sesión <span class="glyphicon glyphicon-log-out"></span> </a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav><!-- Fin Barra de navegación-->

            <div id="contenido"><!--Inicio Contenido-->
                <script>$('#contenido').load('Principal.php')</script>
            </div><!--Fin Contenido-->


            <!--			<div class="footer">	Inicio pie de pagina
                                    <div class="row">
                                            <div class=" col-md-2">
                                                    <img src="../img/OSH-LOGO-FONDO-TRANSPAR-RUEDA.png" class="img-responsive" alt="Responsive image">
                                            </div>
                                                    <div class="col-md-6">
                                                    <p><h1>Pie de pagina	<br>	<small>Sistema de control de acceso</small></h1></p>
                                                    </div>
                                            </div>
                                    </div>Fin pie de pagina-->
        </div>

        <!-- Bootstrap JavaScript -->
        <script src="../bootstrap_js/bootstrap.min.js"></script>
        <!--Jquery Form -->
        <script src="../js/jquery.form.js" type="text/javascript"></script>
        <!--carga el contenido principal de la pagina al inicio-->

    </body>
</html>