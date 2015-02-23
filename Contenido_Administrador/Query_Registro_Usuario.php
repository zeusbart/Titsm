<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
$IDUsuarios_session= $_SESSION['SesionIDUsuarios'];
$Nombre_session = $_SESSION['SesionNombre'];
$Appat_session = $_SESSION['SesionAppat'];
$Apmat_session=$_SESSION['SesionApmat'];
$Tipo_Usuario_session = $_SESSION['SesionTipo_Usuario'];
if ($Tipo_Usuario_session != 1) {
    session_destroy();
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Conexion2 = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Nombre_post = $_POST[Nombre];
$Appat_post = $_POST[Appat];
$Apmat_post = $_POST[Apmat];
$Pass = md5($_POST[Pass]);
$Tipo = $_POST[Tipo];
$Agregar_Usuario = $Conexion->query("Insert into usuarios set Contrasena='$Pass',Tipo='$Tipo',Nombre='$Nombre_post',Appat='$Appat_post',Apmat='$Apmat_post'");

$ImprimirID = mysql_insert_id();

if ($Agregar_Usuario == 1) {
    echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Nuevo usuario registrado! <br> ID de usuario=<strong> $ImprimirID</strong>
                    </div>
                     </div>
                </div> ";
} else {
    echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al insertar los datos!</strong>
                </div>
                </div>
                </div>";
}
?>