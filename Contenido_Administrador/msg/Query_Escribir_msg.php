<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
$IDUsuarios_session= $_SESSION['IDUsuarios'];
$Nombre_session = $_SESSION['Nombre'];
$Appat_session = $_SESSION['Appat'];
$Apmat_session=$_SESSION['Apmat'];
$Tipo_Usuario_session = $_SESSION['Tipo_Usuario'];
if ($Tipo_Usuario_session != 1) {
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
    $Query_escribir = $Conexion->query("insert into mensajes SET Remitente = '$IDUsuarios_session',Receptor= '$id',Asunto='$Asunto' ,Mensaje='$Mensaje'");

    echo "null";
?>
