<?php

    include('login.php');
    date_default_timezone_set("America/Mexico_City");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Comprobante</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="estilos.css" />
    <script src="funciones.js"></script>
</head>
<body>
	<h2>Comprobante</h2>
	<form action="functions.php" method="post">
		
		<div class="comprobante">Fecha y Hora de expedición: <br><input type="text" name="fecha" value="<?php print(date("Y-m-d")."T".date("h:i:s")) ?>" disabled></div>
		<div class="comprobante">Lugar de Expedición <br><input type="text" name="lugarExp"><br></div>
		<div class="comprobante">Serie: <br> <input type="text" name="serie"></div><br>
		<div class="comprobante">Folio: <br> <input type="text" name="folio"></div>
		<div class="comprobante">Moneda: <br> <select name="moneda">
			<option value="" selected="">Seleccione...</option>
			<option value="MXN Peso Mexicano">MXN Peso Mexicano</option>
		</select></div>
		<div class="comprobante">Tipo de Cambio: <br> <input type="text" name="tipoCambio"></div><br>
		<div class="comprobante">Forma de Pago: <br> <select name="formaPago">
			<option value="" selected="" disabled="">Seleccione...</option>
			<option value="01">01 Efectivo</option>
		</select></div>
		<div class="comprobante">Método de Pago: <br> <select name="metodoPago">
			<option value="" selected="" disabled="">Seleccione...</option>
			<option value="PUE">PUE Pago en na sola exhibición</option>
			<option value="PPD">PPD Pago en parcialidades o diferido</option>
		</select></div>
		<div class="comprobante">Confirmación: <br> <input type="text" name="confirmacion" disabled></div><br>
		<div class="comprobante">Condiciones de Pago: <br> <input type="text" name="condiciones"></div><br>
	</form>

</body>
</html>