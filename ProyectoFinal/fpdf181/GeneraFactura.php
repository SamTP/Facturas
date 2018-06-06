<?php

require('fpdf.php');
date_default_timezone_set('America/Mexico_City');
session_start();

$variables = parse_ini_file('../Config.ini');
$dir = $variables['DirectorioRaiz'];
$sub = $variables['SubCarpeta1'];


//Variables
$rfcEmisor = "";
$nombreEmisor = "12";
$rfcReceptor = "12";
$nombreReceptor = "12";
$fecha = date("d/m/Y G:i");
$serie = "12";
$numSerie = "12";
$folio = "12";
$folioFiscal = "12";
$usoCDFI = "12";
$moneda = "12";
$regimen = "12";
$productos = "";
$subtotal = "";
$iva = "";
$total = "";
$fechaCert = date("d/m/Y G:i");



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times', '', 16);


$texto1 = "Factura electronica CFDI";
$pdf->SetXY(.3, .3);
$pdf->SetFont('Times', 'B', 16);
$pdf->SetFillColor(182, 232, 245);
$pdf->Cell(65, 10, $texto1, 0, 0, "C", true);

$texto1 = "Folio Fiscal:";
$pdf->SetXY(65, 0.3);
$pdf->SetFont('Times', 'B', 16);
$pdf->SetFillColor(182, 232, 245);
$pdf->Cell(145, 10, $texto1, 0, 0, "R", true);

$texto1 = $folioFiscal;
$pdf->SetXY(65, 10.5);
$pdf->SetFont('Times', '', 16);
$pdf->Cell(145, 10, $texto1, 0, 0, "R", false);

$texto1 = "Numero de Serie:";
$pdf->SetXY(105, 20.5);
$pdf->SetFont('Times', 'B', 16);
$pdf->SetFillColor(182, 232, 245);
$pdf->Cell(105, 10, $texto1, 0, 0, "R", true);

$texto1 = $numSerie;
$pdf->SetXY(65, 30.5);
$pdf->SetFont('Times', '', 16);
$pdf->Cell(145, 10, $texto1, 0, 0, "R");

$texto1 = "Regimen Fiscal";
$pdf->SetFont('Times', 'B', 16);
$pdf->SetXY(0, 20.5);
$pdf->SetFillColor(182, 232, 245);
$pdf->Cell(105, 10, $texto1, 0, 0, "L", true);

$texto1 = $regimen;
$pdf->SetXY(0, 30.5);
$pdf->SetFont('Times', '', 16);
$pdf->Cell(105, 10, utf8_decode($texto1), 0, 0, "L");

$texto1 = "Lugar,Fecha y Codigo postal de emisión";
$pdf->SetXY(105, 40.5);
$pdf->SetFont('Times', 'B', 12);
$pdf->SetFillColor(182, 232, 245);
$pdf->Cell(105, 10, utf8_decode($texto1), 0, 0, "R", true);

$texto1 = $fecha;
$pdf->SetXY(105, 50.5);
$pdf->SetFont('Times', '', 16);
$pdf->Cell(105, 10, utf8_decode($texto1), 0, 0, "R");

$texto1 = "RFC Receptor:" . $rfcReceptor;
$pdf->SetXY(0, 40.5);
$pdf->SetFont('Times', 'B', 11);
$pdf->SetFillColor(182, 232, 245);
$pdf->Cell(105, 10, $texto1, 0, 0, "L", true);

$texto1 = "Nombre Receptor:" . $nombreReceptor;
$pdf->SetXY(0, 50.5);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(105, 10, utf8_decode($texto1), 0, 0, "L");


$texto1 = "RFC EMISOR: " . $rfcEmisor;
$pdf->SetXY(.3, 10.5);
$pdf->SetFont('Times', 'B', 11);
$pdf->MultiCell(65, 5, $texto1, 0, "L");

$texto1 = "NOMBRE EMISOR: " . $nombreEmisor;
$pdf->SetXY(.3, 15.5);
$pdf->SetFont('Times', 'B', 11);
$pdf->MultiCell(70, 5, $texto1, 0, "L");

$texto1 = "Uso CFDI:" . $usoCDFI;
$pdf->SetXY(.3, 60.5);
$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(50, 5, $texto1, 0, "L");


$texto1 = "Folio:" . $folio;
$pdf->SetXY(50.3, 60.5);
$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(50, 5, $texto1, 0, "L");


$texto1 = "Serie:" . $serie;
$pdf->SetXY(100.3, 60.5);
$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(50, 5, $texto1, 0, "L");

$texto1 = "Moneda:" . $moneda;
$pdf->SetXY(150.3, 60.5);
$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(50, 5, $texto1, 0, "L");




// La cabecera de la tabla 
$pdf->SetXY(5, 75);
$pdf->SetFillColor(25, 71, 253);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(50, 10, "Clave", 1, 0, "C", true);
$pdf->Cell(70, 10, "Descripcion", 1, 0, "C", true);
$pdf->Cell(30, 10, "Cant.", 1, 0, "C", true);
$pdf->Cell(20, 10, utf8_decode("$/Ud"), 1, 0, "C", true);
$pdf->Cell(30, 10, "Subt.", 1, 1, "C", true);
$total = 5.2;

// Los datos (en negro)
$pdf->SetTextColor(0, 0, 0);


$pdf->SetX(5);
$pdf->Cell(50, 10, "123548", 1, 0, "L");
$pdf->Cell(70, 10, "Bla bla", 1, 0, "C");
$pdf->Cell(30, 10, number_format(1), 1, 0, "C");
$pdf->Cell(20, 10, number_format(5.2, 1), 1, 0, "R");
$pdf->Cell(30, 10, number_format(5.2, 2), 1, 1, "R");


// Los totales, IVAs y demás
$pdf->SetX(125);
$pdf->Cell(50, 10, "Subtotal:", 1, 0, "C");
$pdf->Cell(30, 10, number_format($subtotal, 2), 1, 1, "R");
$pdf->SetX(125);
$pdf->Cell(50, 10, "IVA (16%): ", 1, 0, "C");
$pdf->Cell(30, 10, number_format($iva, 2), 1, 1, "R");
$pdf->SetX(125);
$pdf->Cell(50, 10, "Total:", 1, 0, "C");
$pdf->Cell(30, 10, number_format($total, 2), 1, 1, "R");

//Cantidad Con letra
$pdf->SetXY(5, 95);
$pdf->Cell(120, 20, "Total con letra: \n" . "Seisientos pesos 03/100 M.N.", 1, 0, 'L');

//Metodo de Pago
$pdf->SetXY(5, 115);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 10, utf8_decode("PAGO EN UNA SOLA EXHIBICIÓN ") . " PAGO EN EFECTIVO", 1, 0, 'L');


//Pie de Pagina
$pdf->SetXY(15, 130);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(175, 10, utf8_decode("Sello Digital del CDFI:"), 0, 0, 'L');

$pdf->SetXY(15, 135);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(175, 10, utf8_decode("tOSe+Ex/wvn33YIGwtfmrJwQ31Crd7II9VcHTOFhSdpzb"), 0, 0, 'L');

$pdf->SetXY(15, 140);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(175, 10, utf8_decode("Sello Digital del SAT:"), 0, 0, 'L');

$pdf->SetXY(15, 145);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(175, 10, utf8_decode("tOSe+Ex/wvn33YIGwtfmrJwQ31Crd7II9VcHTOFhSdpzb"), 0, 0, 'L');



// Imprimimos el logo a 300 ppp
$pdf->Image('CodigoQR.png', 5, 145, 70);

$pdf->SetXY(70, 155);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(175, 10, utf8_decode("Cadena Original del complemento de certificación digital del SAT:"), 0, 0, 'L');

$pdf->SetXY(70, 160);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(175, 10, utf8_decode("tOSe+Ex/wvn33YIGwtfmrJwQ31Crd7II9VcHTOFhSdpzb"), 0, 0, 'L');

$pdf->SetXY(80, 175);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(70, 5, utf8_decode("No de Serie del Certificado del SAT:"), 0, 0, 'L');

$pdf->SetXY(150, 175);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(70, 5, utf8_decode("30001000000100000801"), 0, 0, 'L');

$pdf->SetXY(80, 188);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(70, 5, utf8_decode("Fecha y hora de certificación:"), 0, 0, 'L');

$pdf->SetXY(150, 188);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(70, 5, utf8_decode($fechaCert), 0, 0, 'L');


// El documento enviado a la carpeta raiz
$nombreArchivo = "Factura-" . $folio . ".pdf";
$path = "../".$dir . "/" . $sub . "/" . $nombreArchivo;
if (is_dir("../".$dir . "/" . $sub)) {
    $pdf->Output($path, 'F');

} else {
    if (is_dir("../".$dir)) {
        mkdir("../".$dir . "/" . $sub);
        $pdf->Output($path, 'F');
    } else {
        mkdir("../".$dir);
        mkdir("../".$dir . "/" . $sub);
        $pdf->Output($path, 'F');
    }

}

?>