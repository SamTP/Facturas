<?php
include('login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menú principal</title>
	 <meta charset="utf-8" />
        <meta lang="es"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Facturacion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="estilos.css" />
        <script src="funciones.js"></script>
</head>
<body>

         <form >
            <h2>Seleccione una opción</h2><br><br>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                   <a href = "sistema.php">Generar Factura</a>
                </label>
               
            </div><br><br>

            <div class="form-group">
                <label class="col-sm-4 control-label">
                   <a href = "consultar.php">Consultar Facturas</a>
                </label>
                
            </div><br><br>


            <div class="form-group">
                <label class="col-sm-4 control-label">
                 <a href = "eliminarF.php">Eliminar Facturas</a>
                </label>
                
            </div><br><br>


        </form>


</body>
</html>