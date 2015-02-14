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

        <script>
            $(document).ready(function() {
                $("#EnviarDatos").click(function() {
                    var DatosForm = $('#Form_Login').serialize();
                    $("#Form_Login").ajaxForm(
                            {
                                url: "login.php",
                                type: "POST",
                                data: DatosForm,
//              target:"#resultado",
                                resetForm: true,
                                success: function(r) {
                                    $("#resultado").html(r);

                                }


                            });

                });



            });



        </script>
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
                            <form  role="form" name="Form_Login" id="Form_Login" class="form-signin">
                                <fieldset>
                                    <!--        <label class="panel-login">
                                        <div class="login_result"></div>
                                    </label>-->

                                    <input class="form-control" placeholder="Username" id="username" required name="username" type="text">
                                    <input class="form-control" placeholder="Password" id="password" required name="password" type="password">
                                    <br>


                                    <button type="submit" id="EnviarDatos" class="btn btn-lg btn-block btn-success">Accesar <span class="glyphicon glyphicon-log-in"></span></button>
                                    <br>

                                    <div id="resultado"></div>
                                </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JavaScript -->
        <script src="bootstrap_js/bootstrap.min.js"></script>
        <!--Jquery Form -->
        <script src="js/jquery.form.js" type="text/javascript"></script>
    </body>
</html>

