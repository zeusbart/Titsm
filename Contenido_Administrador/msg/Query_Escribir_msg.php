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
if ($Tipo_Usuario != 1) {
    session_destroy();
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
include_once '../../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$id = $_POST["id"];
$Asunto = $_POST["Asunto"];
$Mensaje = $_POST["Mensaje"];
    $Query_escribir = $Conexion->query("insert into mensajes SET Remitente = '$IDUsuarios',Receptor= '$id',Asunto='$Asunto' ,Mensaje='$Mensaje'");

    echo "null";
?>
