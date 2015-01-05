<!-- Iniciamos session en PHP -->
<? session_start(); ?>
<!DOCTYPE html>
<html ng-app='myApp'>
<head>
<meta charset="utf-8" />
<title>Buscador en AngularJS</title>
    <!-- Incluimos librerias como bootstrap.css -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" type="text/css" />
    <!-- Agregamos primero jQuery antes que angular es una buena practica -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../angular/angular.min.js"></script>
    <script src="combina.js"></script>
</head>
<body>
 
    <div  class="container">
        <hr>
        <div class="span5" ng-controller="loginCtrl"> 
            <form> 
                <label>Correo</label>
                <input type="text" ng-model="usuario">
                <label>Contraseña</label>
                <input type="password" ng-model="contrasena">
                <br>
                <input type="submit" value="entrar" ng-click="doLogin()" class="btn btn-primary">
                <div>{{aviso}}</div>
            </form>
        </div>
        <!-- creamos una directiva  llamada Loged-->
        <loged ng-hide="true"></loged>
   </div>
 
</body>
</html>