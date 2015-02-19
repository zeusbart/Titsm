<?php
$otro = '   <div class="col-sm-6 col-md-6">
                        <h1>Cerberus	<br>	<small>Reporte Materiales</small></h1>

                    </div> <br>';
$html = '<table border="1" id="Tabla_Usuario" class="table table-bordered table-striped table-hover"  width="100%">
        <thead>
            <tr class="info">
                <td><b>Tipo</b></td>
                <td><b>fecha</b></td>
                <td><b>hora</b></td>
                <td><b>Identificador Materiales</b></td>
                <td><b>Descripcion Materiales</b></td>
                <td><b>Cantidad</b></td>
                <td><b>Unidad</b></td>
                <td><b>Persona de acceso</b></td>          
                <td><b>Razon Equipo</b></td>
                <td><b>Usuario que lo registro</b></td>

                <td><b>Vehiculo Trasporte</b></td>

            </tr>
        </thead>
        <tbody id="Tabla_Persona">';
$Fecha_inicio = $_GET["Fecha_inicio"];
$Fecha_Final = $_GET["Fecha_Final"];
//Consulta Usuario
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
//         $Consulta=$_POST[Consulta];
$Query = $Conexion->get_results("SELECT loges.Tipo,DATE_FORMAT( Hora_Fecha, '%d/%m/%Y' ) as fecha,
date_format(Hora_Fecha,'%h:%i:%s %p') as hora,materiales.Identificador,materiales.Descripcion,materiales.Cantidad,materiales.Unidad, personas.Nombre as Nombre_p,personas.Appat as Appat_p
,personas.Apmat as Apmat_p,loges.RazonEquipo,usuarios.Nombre,usuarios.Appat,usuarios.Apmat,loges.Placa FROM loges join personas ON loges.IDPersona=personas.IDPersona join materiales on 
loges.IDMateriales=materiales.IDMateriales join usuarios on loges.IDUsuarios= usuarios.IDUsuarios 
 where Hora_Fecha>='$Fecha_inicio' and Hora_Fecha<='$Fecha_Final'
");
if ($Query != 0) {
    foreach ($Query as $datos) {

        $Tipo = $datos->Tipo;
        $fecha = $datos->fecha;
        $hora = $datos->hora;
        $Identificador = $datos->Identificador;
        $Descripcion = $datos->Descripcion;
        $Cantidad = $datos->Cantidad;
        $Unidad = $datos->Unidad;
        $Nombre_p = $datos->Nombre_p;
        $Appat_p = $datos->Appat_p;
        $Apmat_p = $datos->Apmat_p;
        $RazonEquipo = $datos->RazonEquipo;
        $Nombre = $datos->Nombre;
        $Appat = $datos->Appat;
        $Apmat = $datos->Apmat;
        $Placa = $datos->Placa;
        switch ($Tipo) {
            case 0:
                $Tipo = "Entrada";
                break;
            case 1:
                $Tipo = "Salida";
                break;
        }
        $html2 = $html2 . '<tr>
                        <td>
                            ' . $Tipo . '
                           </td>
                        <td>' . $fecha . '</td>                                                       
                        <td>' . $hora . '</td>
                        <td>' . $Identificador . '</td>
                        <td>' . $Descripcion . '</td>
                        <td>' . $Cantidad . '</td>
                        <td>' . $Unidad . '</td>
                        <td>' . $Nombre_p . ' ' . $Appat_p . ' ' . $Apmat_p . '</td>
                        <td>' . $RazonEquipo . '</td>
                        <td>' . $Nombre . ' ' . $Appat . ' ' . $Apmat . '</td>
                        <td>' . $Placa . '</td>
                    </tr>';
    }
    $html3 = '  </tbody>
    </table>';
}
//            else {
//                echo "problemas en la consulta";
//            }

require_once ("../dompdf/dompdf_config.inc.php");
$codigo = $otro . $html . $html2 . $html3;
$codigo = utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit", "32M");
$dompdf->set_paper("letter", "landscape");
$dompdf->render();
$dompdf->stream("Reporte_materiales.pdf");
?>



