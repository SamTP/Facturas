<?php 

	require ('LibreriaCon.php');

	$variables = parse_ini_file('Config.ini');



	echo "aqui vergas";
    $pdo = conectarMysqlAnx($variables);
    //Comprobante
    $query = "INSERT INTO (Version,	Serie,	Folio,	Fecha,	Sello,	FormaPago,	Certificado,	NoCertificado,	CondicionesDePago,	SubTotal,	Moneda,	TipoCambio,	Total,	TipoDeComprobante,	MetodoPago,	LugarExpedicion,	Confirmacion,	RFCEmisor,	RFCReceptor) VALUES (3.3,'".$_POST['serie']."','".$_POST['folio']."','".$_POST['fechaExpedicion']."','".'ASHCXJ3243ASDAS23-XE'."','".$_POST['formaPago']."',ASHCXJ3243ASDAS23','45,'".$_POST['condiciones']."','".$_POST['subtotal']."','".$_POST['moneda']."','".$_POST['tipoCambio']."','".$_POST['total']."','".$_POST['tipoComprobante']."','".$_POST['metodoPago']."','".$_POST['lugarExpedicion']."','".$_POST['confirmacion']."','".$_POST['rfcEmisor']."','".$_POST['rfCReceptor']."')'";

    echo($query);

/*
    //Conceptos
    $query = "SELECT idComprobante FROM comprobante WHERE Folio = $_POST['folio']";
    $query = $pdo->prepare($query);
    $query->execute();
    $idComprobante = $query->fetchAll();
   
    $conceptos = json_decode($_POST['conceptos'], true);
    $query = "INSERT INTO (ClaveProdServ, NoIdentificacion, Cantidad, Unidad, Descripcion, ValorUnitario, Importe, idComprobante) concepto VALUES ($conceptos=>claveprod, $conceptos=>noIdentificacion,$conceptos=>cantidad,$conceptos=>unidad,$conceptos=>descripcion,$conceptos=>valorU,$conceptos=>importe,$idComprobante);";

    $query = $pdo->prepare($query);
    $query->execute();*/
 ?>