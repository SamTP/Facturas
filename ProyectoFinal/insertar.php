<?php 

	require ('LibreriaCon.php');
	require ('GeneraXML.php');
	require ('fpdf181/GeneraFactura.php');

	$variables = parse_ini_file('Config.ini');
	$pdo = conectarMysqlAnx($variables);
	// print_r($variables);
	session_start();

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

	$claveprod = $_POST['claveprod'];
	$cantidad = $_POST['cantidad'];
	$unidad = $_POST['unidad'];
	$claveUnidad = $_POST['claveUnidad'];
	$noIdentificacion = $_POST['noIdentificacion'];
	$descripcion = $_POST['descripcion'];
	$valorU = $_POST['valorU'];
	$importe = $_POST['importe'];
	$impuesto = $_POST['impuesto'];
	$tasa = $_POST['tasa'];
	$importeTotal = $_POST['importeTotal'];

	generaXML($rfcEmisor ,$nombreEmisor,$rfCReceptor,$nombreReceptor,
	$fecha,$serie,$folio,$cfdi,$moneda,$regimenFiscal,$conceptos,$subtotal,
	$impuestosTras,$total,$tipoComprobante,$claveprod,$descripcion,$cantidad,$valorU);
	generaFactura($conceptos,$rfcEmisor,$nombreEmisor,$rfCReceptor,
	$nombreReceptor,$serie,$folio,$cfdi,$moneda,$regimenFiscal,
	$subtotal,$impuestosTras,$total,$claveprod,$descripcion,$cantidad,$valorU);

    //Comprobante
    $query = "INSERT INTO comprobante VALUES (null,'3.3','$serie', '$folio', '$fechaExpedicion', 'ASHCXJ3243ASDAS23-XE', '$formaPago', 'ASHCXJ3243ASDAS23','45', '$condiciones', '$subtotal', '$moneda', '$tipoCambio', '$total', '$tipoComprobante','$metodoPago', '$lugarExpedicion', '$confirmacion', '$rfcEmisor', '$rfCReceptor');";

    print_r($query);
    
    $query = $pdo->prepare($query);
    $query->execute();



    //Conceptos
    $query = "SELECT idComprobante FROM comprobante WHERE Folio = $folio";
    $query = $pdo->prepare($query);
    $query->execute();
    $idComprobante = $query->fetchAll();

    print_r($idComprobante);
   
    $query = "INSERT INTO (ClaveProdServ, NoIdentificacion, Cantidad, Unidad, Descripcion, ValorUnitario, Importe, idComprobante) concepto VALUES ($claveprod, $noIdentificacion,$cantidad,$unidad,$descripcion,$valorU,$importe,$idComprobante);";

    print_r($query);
    $query = $pdo->prepare($query);
    $query->execute();
 ?>