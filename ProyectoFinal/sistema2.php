<?php

    //include('login.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta lang="es"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="estilos.css" />
    <script src="funciones.js"></script>
</head>
<body>
    <h1>Sistema de Facturacion</h1>
    <h2>Comprobante</h2>

    <form action="functions.php" method="post">
        
        <p>Fecha y hora de Expedición: </p><p><input type="datetime-local" id="fechaExpedicion" required></p>

        <p>Lugar de Expedición: </p><p><input type="text" id="lugarExpedicion" required></p>

        <p>Serie: </p><p><input type="text" id="serie" required></p>

        <p>Folio: </p><p><input type="text" id="folio" required></p>
        
        <p>Moneda: </p>
        <select id="moneda" required>
            <option value="moneda">Peso Mexicano MXN</option>
        </select>

        <p>Tipo de Cambio: </p><p><input type="text" id="tipoCambio" required></p>
        
        <p>Forma de PAgo: </p>
        <select id="formaPago" required>
            <option value="formaPago">01 Efectivo</option>
        </select>

        <p>Metodo de Pago: </p>
        <select id="metodoPago" required>
            <option value="metodoPago">01 Pago en una sola exhibición</option>
        </select>

        <p>Confirmación: </p><p><input type="text" id="confirmacion" required></p>

        <p>Condiciones de Pago: </p><p><input type="text" id="condiciones" required></p>
    </form>


    <h2>CFDI Relacionados </h2>


    <form>
        
        <p>Tipo de Relación: </p>
        <select id="metodoPago" required>
            <option value="metodoPago">01 Pago en una sola exhibición</option>
        </select>

        <p>Conceptos: </p><p><input type="button" id="conceptos" onclick="" value="Agregar"></p>
        <div class="conceptos">
            
        </div>


         
        <input type="button" onclick="" value="Continuar">
    </form>
    <h2><a href = "logout.php">Salir</a></h2>
</body>
</html>