
<?php
require_once './lib/fpdf/fpdf.php';
include_once './Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
//210 ancho
class PDF extends FPDF {

    function Header() {
        $this->SetFont("Arial", "B", 20);
        $this->Image("img/logo_OSH.png", 10, 10, 60, 40, 'png');
        $this->Ln(15);
        $this->Cell(65, 20, '', 0);
        $this->Cell(75, 20, 'Cerberus', 0);
        $this->SetFont("Arial", "", 10);
        $this->Cell(50, 20, 'Fecha de Creacion:' . date('d-m-y'), 0);
        $this->Ln(25);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(190, 20, 'Reporte de materiales', 0);
        $this->Ln(25);


        $this->Cell(30, 10, 'Tipo', 1, 0, 'C');
        $this->Cell(30, 10, 'fecha', 1, 0, 'C');
        $this->Cell(30, 10, 'hora', 1, 0, 'C');
        $this->Cell(50, 10, 'Descripcion', 1, 0, 'C');
        $this->Cell(30, 10, 'Cantidad', 1, 0, 'C');
        $this->Cell(30, 10, 'Unidad', 1, 0, 'C');
        $this->Cell(30, 10, 'IDPersona', 1, 0, 'C');
        $this->Cell(30, 10, 'Nombre', 1, 0, 'C');
        $this->Cell(30, 10, 'Appat', 1, 1, 'C');
    }

    // Pie de página
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$Query = $Conexion->get_results("SELECT logesmateriales.Tipo,DATE_FORMAT( Hora_Fecha, '%d/%m/%Y' ) as fecha,
date_format(Hora_Fecha,'%h:%i:%s %p') as hora,materiales.Descripcion,materiales.Cantidad,materiales.Unidad,personas.IDPersona, personas.Nombre,personas.Appat
,personas.Apmat,logesmateriales.Personas_Obs,logesmateriales.IDUsuarios,usuarios.Nombre,usuarios.Appat,usuarios.Apmat,logesmateriales.Placa,
logesmateriales.Vehiculo_Obs FROM logesmateriales join personas ON logesmateriales.IDPersona=personas.IDPersona join materiales on 
logesmateriales.IDMateriales=materiales.IDMateriales join usuarios on logesmateriales.IDUsuarios= usuarios.IDUsuarios 
 where Hora_Fecha>='2015-01-09 00:00:00' and Hora_Fecha<='2015-01-11 23:59:59'
");

if ($Query != 0) {
    foreach ($Query as $datos) {
        $Tipo = $datos->Tipo;
//                    Tipo, fecha, , , , , , , ,
//                            Apmat, Personas_Obs, IDUsuarios, Nombre, Appat, Apmat, Placa, Vehiculo_Obs, id
        $pdf->Cell(30, 10, $IDUsuarios = $datos->Tipo, 1, 0, 'C');
        $pdf->Cell(30, 10, $IDUsuarios = $datos->fecha, 1, 0, 'C');
        $pdf->Cell(30, 10, $IDUsuarios = $datos->hora, 1, 0);
        $pdf->Cell(50, 10, $IDUsuarios = $datos->Descripcion, 1, 0);
        $pdf->Cell(30, 10, $IDUsuarios = $datos->Cantidad, 1, 0);
        $pdf->Cell(30, 10, $IDUsuarios = $datos->Unidad, 1, 0);
        $pdf->Cell(30, 10, $IDUsuarios = $datos->IDPersona, 1, 0, 'C');
        $pdf->Cell(30, 10, $IDUsuarios = $datos->Nombre, 1, 0, 'C');
        $pdf->Cell(30, 10, $IDUsuarios = $datos->Appat, 1, 1, 'C');

//          $pdf->Cell(20,10, $IDUsuarios=$datos -> Nombre,0,0,'C'); 
//          $pdf->Cell(20,10, $IDUsuarios=$datos -> Nombre,0,0,'C'); 
//          $pdf->Cell(20,10, $IDUsuarios=$datos -> Nombre,0,0,'C'); 
//          $pdf->Cell(25,10, $IDUsuarios=$datos -> Appat,1,1,'C');  
    }
}

$pdf->Output();
?>