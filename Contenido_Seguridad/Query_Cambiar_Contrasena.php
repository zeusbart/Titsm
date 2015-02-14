<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$IDUsuarios = $_SESSION['IDUsuarios'];
$PassActual = md5($_POST["PassActual"]);
$PassNueva = md5($_POST["PassNueva"]);
$Actualizar_Usuario = $Conexion->query("update usuarios set Contrasena='$PassNueva' where IDUsuarios='$IDUsuarios' and Contrasena='$PassActual'");

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