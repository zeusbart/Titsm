<?php
$otro = '   <div class="col-sm-6 col-md-6">
                        <h1>Cerberus	<br>	<small>Reporte Vehiculos</small></h1>

                    </div> <br>';
$html = '<table border="1" id="Tabla_Usuario" class="table table-bordered table-striped table-hover"  width="100%">
        
            <tr class="info">
               <td><b>Tipo</b></td>
               <td><b>fecha</b></td>
               <td><b>hora</b></td> 
               <td><b>Persona de acceso</b></td> 
               <td><b>placa</b></td>  
               <td><b>marca</b></td>
               <td><b>modelo</b></td>
               <td><b>color</b></td>                   
               <td><b>observaciones</b></td>                  
            </tr>
        
       ';

$Fecha_inicio = $_GET["Fecha_inicio"] . " " . "00:00:00";
$Fecha_Final = $_GET["Fecha_Final"] . " " . "23:59:59";

//Consulta Usuario
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);

$Query = $Conexion->get_results("SELECT 
                                            loges.Tipo,
                                            DATE_FORMAT(loges.Hora_Fecha, '%d/%m/%Y' ) as fecha,
                                            DATE_FORMAT(loges.Hora_Fecha,'%h:%i:%s %p') as hora,
                                             personas.Nombre as Nombre_p,
                                            personas.Appat as Appat_p,
                                            personas.Apmat as Apmat_p,
                                            loges.Placa,
                                            vehiculos.Marca,
                                            vehiculos.Modelo,
                                            vehiculos.Color,
                                            loges.Vehiculo_Obs
                                            from 
                                            loges join vehiculos on loges.Placa = vehiculos.Placa join personas on loges.IDPersona=personas.                                             IDPersona where Hora_Fecha>='$Fecha_inicio' and Hora_Fecha<='$Fecha_Final'");
if ($Query != 0) {
    foreach ($Query as $datos) {
        $Tipo = $datos->Tipo;
        $fecha = $datos->fecha;
        $hora = $datos->hora;
        $Nombre_p = $datos->Nombre_p;
        $Appat_p = $datos->Appat_p;
        $Apmat_p = $datos->Apmat_p;
        $placa = $datos->Placa;
        $Marca = $datos->Marca;
        $Modelo = $datos->Modelo;
        $Color = $datos->Color;
        $Vehiculo_Obs = $datos->Vehiculo_Obs;
        switch ($Tipo) {
            case 0:
                $Tipo = "Entrada";
                break;
            case 1:
                $Tipo = "Salida";
                break;
        }

        $html2 = $html2 . '      <tr>
                        <td>
                           
                            ' . $Tipo . '
                            </td>
                        <td> ' . $fecha . '</td>                                                       
                        <td> ' . $hora . ' </td>
                        <td> ' . $Nombre_p . ' ' . $Appat_p . ' ' . $Apmat_p . ' </td>
                        <td> ' . $placa . ' </td>
                        <td> ' . $Marca . ' </td>
                        <td> ' . $Modelo . ' </td>
                        <td> ' . $Color . ' </td>
                        <td> ' . $Vehiculo_Obs . '</td>
                    </tr>';
    }
    $html3 = '
    </table>';
}
require_once ("../dompdf/dompdf_config.inc.php");
$codigo = $otro . $html . $html2 . $html3;
$codigo = utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit", "32M");
$dompdf->set_paper("letter", "landscape");
$dompdf->render();
$dompdf->stream("Reporte vehiculos.pdf");
?>
      