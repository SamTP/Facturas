<?php 

	require ('LibreriaCon.php');

	$variables = parse_ini_file('Config.ini');

	//session_start();

	$rfcEmisor = $_POST['rfcEmisor'];
	$nombreEmisor = $_POST['nombreEmisor'];
	$regimenFiscal = $_POST['regimenFiscal'];
	$tipoComprobante= $_POST['tipoComprobante'];

	$rfCReceptor = $_POST['rfCReceptor'];
	$nombreReceptor = $_POST['nombreReceptor'];
	$residenciaFiscal = $_POST['residenciaFiscal'];
	$noRegistro = $_POST['noRegistro'];
	$cfdi = $_POST['cfdi'];

	$fechaExpedicion = $_POST['fechaExpedicion'];
	$lugarExpedicion = $_POST['lugarExpedicion'];
	$serie = $_POST['serie'];
	$folio = $_POST['folio'];
	$moneda = $_POST['moneda'];
	$tipoCambio = $_POST['tipoCambio'];
	$formaPago = $_POST['formaPago'];
	$metodoPago = $_POST['metodoPago'];
	$confirmacion = $_POST['confirmacion'];
	$condiciones = $_POST['condiciones'];
	$tipoRelacion = $_POST['tipoRelacion'];
	$subtotal = $_POST['subtotal'];
	$impuestosTras = $_POST['impuestosTras'];
	$total = $_POST['total'];

	$conceptos = json_decode($_POST['conceptos'], true);


    //$pdo = conectarMysqlAnx($variables);
    //Comprobante
    $query = "INSERT INTO ('Version', 'Serie', 'Folio', 'Fecha', 'Sello', 'FormaPago', 'Certificado', 'NoCertificado',	'CondicionesDePago', 'SubTotal', 'Moneda', 'TipoCambio', 'Total', 'TipoDeComprobante', MetodoPago, 'LugarExpedicion', 'Confirmacion', 'RFCEmisor', 'RFCReceptor') VALUES ('3.3', $serie, $folio, $fechaExpedicion, 'ASHCXJ3243ASDAS23-XE', $formaPago, 'ASHCXJ3243ASDAS23','45', $condiciones, $subtotal, $moneda, $tipoCambio, $total, $tipoComprobante,$metodoPago, $lugarExpedicion, $confirmacion, $rfcEmisor, $rfCReceptor);";

    print_r($query);
    /*
    $query = $pdo->prepare($query);
    $query->execute();*/


    //Conceptos
    $query = "SELECT idComprobante FROM comprobante WHERE Folio = $folio";
    $query = $pdo->prepare($query);
    $query->execute();
    $idComprobante = $query->fetchAll();
   
    $query = "INSERT INTO (ClaveProdServ, NoIdentificacion, Cantidad, Unidad, Descripcion, ValorUnitario, Importe, idComprobante) concepto VALUES ($conceptos=>claveprod, $conceptos=>noIdentificacion,$conceptos=>cantidad,$conceptos=>unidad,$conceptos=>descripcion,$conceptos=>valorU,$conceptos=>importe,$idComprobante);";

    $query = $pdo->prepare($query);
    $query->execute();*/
 ?>