<?php

    include('login.php');

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
    <h2>Datos del emisor</h2>

    <form action="functions.php" method="post">
        
        <p>RFC: </p><p><input type="text" id="rfcEmisor" value="<?php echo($_SESSION['rfc']); ?>" disabled></p>
        <p>Nombre o Razon Social:</p><p><input id="nombreEmisor" type="text" value="<?php echo($_SESSION['nombreEmisor']); ?>"></p>

        <select id="regimenFiscal">
            <option value=""selected>Seleccione...</option>
            <option value="regimen1">Regimen Fiscal</option>
        </select>
        <select id="tipoComprobante">
            <option value="" selected>Seleccione...</option>
            <option value="ingreso">Ingreso</option>
        </select>

    </form>


    <h2>Datos del Receptor</h2>


    <form>
        
         <p>RFC registrado: </p><p><input type="text" id="rfcReceptor" placeholder="RFC receptor" ></p>
        <p>Nombre o Razon Social</p><p><input type="text" id="nombreReceptor" value="Nombre del Receptor" disabled></p>
        <select id="residenciaFiscal">
            <option value="residencia">Residencia Fiscal</option>
        </select>
        <select id="noRegistro">
            <option value="registro">No. de registro de identidad fiscal</option>
        </select>
        <select id="cfdi">
            <option value="cfdi1">Uso de CFDI</option>
        </select>
        <br><br>
         <input type="button" name="siguiente" value="siguiente" onclick="emisorReceptor()"; >

    </form>
    <h2><a href = "logout.php">Salir</a></h2>
</body>
</html>