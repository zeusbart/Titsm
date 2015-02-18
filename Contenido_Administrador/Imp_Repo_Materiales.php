<?php $html = '<table id="Tabla_Usuario" class="table table-bordered table-striped table-hover"  width="100%">
        <thead>
            <tr class="info">

                <th>Tipo</th>
                <th>fecha</th>
                <th>hora</th>                  
                <th>Persona de acceso</th>  
                <th>Telefono</th>
                <th>Compania</th>
                <th>Razon</th>                   
                <th>Observacion Persona</th>                  
                <th>Usuario que lo registro</th>

            </tr>
        </thead>
        <tbody id="Tabla_Persona">'; ?>
<?php

$Fecha_inicio = $_POST["Fecha_inicio"] . " " . "00:00:00";
$Fecha_Final = $_POST["Fecha_Final"] . " " . "23:59:59";
//Consulta Usuario
include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
//         $Consulta=$_POST[Consulta];
$Query = $Conexion->get_results("SELECT loges.Tipo,
                                            DATE_FORMAT(Hora_Fecha, '%d/%m/%Y' ) as fecha,
                                            DATE_FORMAT(Hora_Fecha,'%h:%i:%s %p') as hora,
                                            loges.RazonPersona,
                                            loges.Personas_Obs,
                                            usuarios.Nombre as Nombre_u,
                                            usuarios.Appat as Appat_u,
                                            usuarios.Apmat as Apmat_u,
                                            personas.Nombre as Nombre_p,
                                            personas.Appat as Appat_p,
                                            personas.Apmat as Apmat_p,
                                            personas.Telefono,
                                            personas.Compania 
                                            from loges join Usuarios on loges.IDUsuarios=usuarios.IDUsuarios join personas on loges.IDPersona=personas.IDPersona where Hora_Fecha>='2015-02-01 00:00:00' and Hora_Fecha<='2015-04-04 23:59:59'");
if ($Query != 0) {
    foreach ($Query as $datos) {
        $Tipo = $datos->Tipo;
        $fecha = $datos->fecha;
        $hora = $datos->hora;
        $Nombre_p = $datos->Nombre_p;
        $Appat_p = $datos->Appat_p;
        $Apmat_p = $datos->Apmat_p;
        $Observaciones = $datos->Personas_Obs;
        $Razon = $datos->RazonPersona;
        $Nombre_u = $datos->Nombre_u;
        $Appat_u = $datos->Appat_u;
        $Apmat_u = $datos->Apmat_u;
        $Telefono = $datos->Telefono;
        $Compania = $datos->Compania;
        switch ($Tipo) {
            case 0:
                $impTipo = "Entrada";
                break;
            case 1:
                $impTipo = "Salida";
                break;
        }
        ?>
        <?php
        $html2 = $html2 . ' <tr>
                        <td>
                ' . $impTipo . '
          
                    </td>
                        <td>' . $fecha . '</td>                                                       
                        <td>' . $hora . '</td>
                        <td>' . $Nombre_p .' " " '. $Appat_p . '" " '. $Apmat_p . '</td>
                        <td>' . $Telefono . '</td>
                        <td>' . $Compania . '</td>
                        <td>' . $Razon . 'td>
                        <td>' . $Observaciones . '</td>
                        <td>' . $Nombre_u . '" " '. $Appat_u .' " " '. $Apmat_u . '</td>
                    </tr>';
    }
    $html3 = '</tbody>
    </table>';
    $codigo = $html . $html2 . $html3;
} else {
    $html = "problemas en la consulta";
    $codigo = $html;
}
?>
<?php
require_once ("../dompdf/dompdf_config.inc.php");
//$codigo=$html.$html2.$html3;
$codigo = utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit", "32M");
$dompdf->render();
$dompdf->stream("ejemplo.pdf");
?>