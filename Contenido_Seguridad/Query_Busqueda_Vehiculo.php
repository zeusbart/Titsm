<?php
//Consulta Usuario
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Pla = $_POST['Placa'];

$Query = $Conexion->get_results("select * from vehiculos where Placa='$Pla'");
$Resultado = array();
if ($Query != 0) {
    foreach ($Query as $datos) {
        $Placa = $datos->Placa;
        $Marca = $datos->Marca;
        $Modelo = $datos->Modelo;
        $Color = $datos->Color;

        $Resultado['Placa'] = $Placa;
        $Resultado['Marca'] = $Marca;
        $Resultado['Modelo'] = $Modelo;
        $Resultado['Color'] = $Color;

        echo json_encode($Resultado);
    }
} else {
    echo 'problemas en la consulta';
}
?>
 
