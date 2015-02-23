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
if ($Tipo_Usuario_session != 2) {
    session_destroy();
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
//$IDUsuarios = $_SESSION['IDUsuarios'];
$PassActual = md5($_POST["PassActual"]);
$PassNueva = md5($_POST["PassNueva"]);
$Actualizar_Usuario = $Conexion->query("update usuarios set Contrasena='$PassNueva' where IDUsuarios='$IDUsuarios_session' and Contrasena='$PassActual'");

if ($Actualizar_Usuario == 1) {//comprobamos que se guardo el registro
    echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Usuario actualizado con exito!
                    </div>
                     </div>
                </div> ";
} else {
    echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Compruebe que la contraseña actual sea correcta!</strong>
                </div>
                </div>
                </div>";
}//fin else comprobacion registro Persona
?>