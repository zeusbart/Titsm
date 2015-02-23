<?php
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