<?php

function generaXML($rfcEmisor ,$nombreEmisor,$rfcReceptor,$nombreReceptor,
$fecha,$serie,$folio,$usoCDFI,$moneda,$regimen,$subtotal,
$iva,$total,$tipo,$claveprod,$descripcion,$cantidad,$valorU){

$variables = parse_ini_file('Config.ini');
$dir = $variables['DirectorioRaiz'];
$sub = $variables['SubCarpeta2'];


$numSerie=131;
$folioFiscal="overv-wef48-8q";

$xml = new SimpleXMLElement("<comprobante></comprobante>");

//$hijo = $xml->addchild('documento', '');

$hijo = $xml->addchild('RFCemisor', '');
$hijo->addAttribute('RFCemisor', $rfcEmisor);
$hijo = $xml->addchild('NombreEmisor', '');
$hijo->addAttribute('NombreEmisor', $nombreEmisor);
$hijo = $xml->addchild('RFCReceptor', '');
$hijo->addAttribute('RFCreceptor', $rfcReceptor);
$hijo = $xml->addchild('NombreReceptor', '');
$hijo->addAttribute('NombreReceptor', $nombreReceptor);
$hijo = $xml->addchild('Fecha', '');
$hijo->addAttribute('fecha', $fecha);
$hijo = $xml->addchild('Serie', '');
$hijo->addAttribute('serie', $serie);
$hijo = $xml->addchild('Folio', '');
$hijo->addAttribute('folio', $folio);
$hijo = $xml->addchild('FolioFiscal', '');
$hijo->addAttribute('folioFiscal', $folioFiscal);
$hijo = $xml->addchild('usoCDFI', '');
$hijo->addAttribute('usoCDFI', $usoCDFI);
$hijo = $xml->addchild('Moneda', '');
$hijo->addAttribute('moneda', $moneda);
$hijo = $xml->addchild('Regimen', '');
$hijo->addAttribute('regimen', $regimen);
$hijo = $xml->addchild('NumSerie', '');
$hijo->addAttribute('numSerie', $numSerie);
$hijo = $xml->addchild('Concepto', '');
$hijo->addAttribute('descripcion', $descripcion);
$hijo->addAttribute('clave', $claveprod);
$hijo->addAttribute('cantidad', $cantidad);
$hijo->addAttribute('valorU', $valorU);
$hijo = $xml->addchild('Subtotal', '');
$hijo->addAttribute('subtotal', $subtotal);
$hijo = $xml->addchild('Iva', '');
$hijo->addAttribute('iva', $iva);
$hijo = $xml->addchild('Total', '');
$hijo->addAttribute('total', $total);
$hijo = $xml->addchild('TipoCambio', '');
$hijo->addAttribute('tipoCambio', $tipo);

  //  Header('Content-type: text/xml');


	//echo $xml->asXML();
$nombreArchivo = "Factura-" . $folio . ".xml";


if (is_dir($dir . "/" . $sub)) {
    $xml->asXML($dir . "/" . $sub . "/" . $nombreArchivo);

} else {
    if (is_dir($dir)) {
        mkdir($dir . "/" . $sub);
        $xml->asXML($dir . "/" . $sub . "/" . $nombreArchivo);
    } else {
        mkdir($dir);
        mkdir($dir . "/" . $sub);
        $xml->asXML($dir . "/" . $sub . "/" . $nombreArchivo);
    }

}


}

?>