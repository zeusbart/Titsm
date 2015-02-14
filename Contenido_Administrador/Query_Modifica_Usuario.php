<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);

$hiddenIDUsuarios = $_POST["hiddenIDUsuarios"];
$Nombre = $_POST["Nombre"];
$Appat = $_POST["Appat"];
$Apmat = $_POST["Apmat"];
$Pass = md5($_POST["Pass"]);
$Tipo = $_POST["Tipo"];

$Actualizar_Usuario = $Conexion->query("update usuarios set Nombre='$Nombre',Appat='$Appat',Apmat='$Apmat',Contrasena='$Pass',Tipo='$Tipo' where IDUsuarios='$hiddenIDUsuarios'");

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
                    <strong>Problemas al actualizar los datos de usuario!</strong>
                </div>
                </div>
                </div>";
}//fin else comprobacion registro Persona
?>