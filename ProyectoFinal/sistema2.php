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
        
        <form action="functions.php" method="post" style="height: 450px;">
            <h2>Comprobante</h2>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Fecha y hora de Expedición:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="fechaExpedicion" value="<?php print(date("Y-m-d")."T".date("h:i:s")) ?>" disabled>
                </div>
                
            </div>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Lugar de Expedición:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="lugarExpedicion" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Serie:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="serie" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Folio:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="folio" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Moneda:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="moneda" required>
                        <option value="moneda">Peso Mexicano MXN</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Tipo de Cambio:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="tipoCambio" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Forma de Pago:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="formaPago" required>
                        <option value="formaPago">01 Efectivo</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Metodo de Pago:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="metodoPago" required>
                        <option value="metodoPago">01 Pago en una sola exhibición</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Confirmación:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="confirmacion" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Condiciones de Pago:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="condiciones" required>
                </div>
            </div>
        </form>
        
        <form>
            <h2>CFDI Relacionados </h2>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Tipo de Relación:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="metodoPago" required>
                        <option value="metodoPago">01 Pago en una sola exhibición</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Conceptos:
                </label>
                <div class="col-sm-8">
                    <input type="button" id="conceptos" onclick="" value="Agregar">
                </div>
                <div class="conceptos">
                    
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    .
                </label>
                <div class="col-sm-8">
                    <input type="button" onclick="" value="Continuar">
                </div>
                
            </div>
        </form>
        <br>
        <br>
        <h2><a href = "logout.php">Salir</a></h2>
    </body>
</html>