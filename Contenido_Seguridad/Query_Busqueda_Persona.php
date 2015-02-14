<?php

//Consulta Usuario
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Persona = $_POST['IDPersona'];

$Query = $Conexion->get_results("select * from personas where IDPersona='$Persona' ");
$Resultado = array();
if ($Query != 0) {
    foreach ($Query as $datos) {
        $IDPersona = $datos->IDPersona;
        $Nombre = $datos->Nombre;
        $Appat = $datos->Appat;
        $Apmat = $datos->Apmat;
        $Telefono = $datos->Telefono;
        $Compania = $datos->Compania;

        $Resultado['IDPersona'] = $IDPersona;
        $Resultado['Nombre'] = $Nombre;
        $Resultado['Appat'] = $Appat;
        $Resultado['Apmat'] = $Apmat;
        $Resultado['Telefono'] = $Telefono;
        $Resultado['Compania'] = $Compania;

        echo json_encode($Resultado);
    }
} else {
    echo 'problemas en la consulta';
}
?>
 