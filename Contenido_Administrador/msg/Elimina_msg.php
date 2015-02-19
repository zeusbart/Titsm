<?php
include_once '../../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Fila_Mensaje=$_POST["Fila_Mensaje"];
$Borrar_Mensaje=$Conexion->query("UPDATE cerberus.mensajes SET Estado='3' WHERE mensajes.IDMensajes =$Fila_Mensaje ;"); 

echo "null";

?>

