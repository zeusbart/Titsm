<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../../index.php";
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
                    window.location="../../index.php";
                </script>';
}
include_once '../../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Mensaje = $_POST["Mensaje"];
$E_S_msg = $_POST["E_S_msg"];

if ($E_S_msg == "1") {
    $Query_leido = $Conexion->query("UPDATE mensajes SET Estado = 2 WHERE mensajes.IDMensajes =$Mensaje");
    $Query_leer = $Conexion->get_results("SELECT Remitente,Asunto,Mensaje,usuarios.Nombre,usuarios.Appat,usuarios.Apmat  FROM mensajes join usuarios on Remitente=IDUsuarios WHERE IDMensajes=$Mensaje");
} else {
    $Query_leer = $Conexion->get_results("SELECT Receptor,Asunto,Mensaje,usuarios.Nombre,usuarios.Appat,usuarios.Apmat  FROM mensajes join usuarios on Receptor=IDUsuarios WHERE IDMensajes=$Mensaje");
}
$Resultado = array();
if ($Query_leer != 0) {
    foreach ($Query_leer as $datos) {
        if ($E_S_msg == "1") {
            $Remitente = $datos->Remitente;
        } else {
            $Remitente = $datos->Receptor;
        }
        $Asunto = $datos->Asunto;
        $datoMensaje = $datos->Mensaje;
        $Nombre_u = $datos->Nombre;
        $Appat_u = $datos->Appat;
        $Apmat_u = $datos->Apmat;

        $Resultado['Remitente'] = $Nombre_u . " " . $Appat_u . " " . $Apmat_u;;
        $Resultado['Asunto'] = $Asunto;
        $Resultado['Mensaje'] = $datoMensaje;


        echo json_encode($Resultado);
    }
}
?>