<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cerberus</title>
            <!-- jQuery -->
                <script src="js/jquery-1.10.2.js"></script>
		<!-- Bootstrap CSS -->
                <link href="bootstrap_css/bootstrap.min.css" rel="stylesheet">
                <link href="css/login.css" rel="stylesheet">
	</head>
	<body>
		 <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row-fluid user-row">
                                    <img src="img/logo_OSH.png " class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" action="index.php" method="post" class="form-signin">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>

                                        <input class="form-control" placeholder="Username" id="username" required name="username" type="text">
                                        <input class="form-control" placeholder="Password" id="password" required name="password" type="password">
                                       <br>
                                      
                                      
                                        <button type="submit" class="btn btn-lg btn-block btn-success">Accesar <span class="glyphicon glyphicon-log-in"></span></button>
                                        <br>
                                            <?php
                                        include_once 'Variables_Conexion.php';
                                            $bd =new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost);
                                            $username=$_POST[username];
                                            $password=$_POST[password];


                                                $msql_usuario= $bd ->get_row("select * from usuarios where Usuario='$username' and Contrasena='$password'");

                                                if($msql_usuario != NULL){

                                                  echo "<script language='javascript'>window.location='Contenido_Administrador/Menu_Administrador.php'</script>;";

                                                }else if($username != NULL){
                                                    echo '<div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <strong>Acceso Denegado!</strong> </br> Pongase en contacto con recusos humanos
                                                    </div>';
                                                }
                                                 ?>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	
		<!-- Bootstrap JavaScript -->
                <script src="bootstrap_js/bootstrap.min.js"></script>
	</body>
</html>

