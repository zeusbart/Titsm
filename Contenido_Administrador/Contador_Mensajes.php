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
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Query_Contador = $Conexion->get_var("select count(*) from mensajes where Receptor='$IDUsuarios' and Estado=1");
$Resultado = array();
$Resultado['Contador'] = $Query_Contador;
echo json_encode($Resultado);
?>