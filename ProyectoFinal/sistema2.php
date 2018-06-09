<?php
include('login.php');
$variables = parse_ini_file('Config.ini');
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
                        <option value="MXN">Peso Mexicano MXN</option>
                        <option value="USD">Dolar Americano USD</option>
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
                    <option value='Efectivo''>Efectivo</option><option value='Cheque nominativo''>Cheque nominativo</option><option value='Transferencia electronica de fondos''>Transferencia electronica de fondos</option><option value='Tarjeta de credito''>Tarjeta de credito</option><option value='Monedero electronico''>Monedero electronico</option><option value='Dinero electronico''>Dinero electronico</option><option value='Vales de despensa''>Vales de despensa</option><option value='Dacion en pago''>Dacion en pago</option><option value='Pago por subrogacion''>Pago por subrogacion</option><option value='Pago por consignacion''>Pago por consignacion</option><option value='Condonacion''>Condonacion</option><option value='Compensacion''>Compensacion</option><option value='Novacion''>Novacion</option><option value='Confusion''>Confusion</option><option value='Remision de deuda''>Remision de deuda</option><option value='Prescripcion o caducidad''>Prescripcion o caducidad</option><option value='A satisfaccion del acreedor''>A satisfaccion del acreedor</option><option value='Tarjeta de debito''>Tarjeta de debito</option><option value='Tarjeta de servicios''>Tarjeta de servicios</option><option value='Aplicacion de anticipos''>Aplicacion de anticipos</option><option value='Intermediario pagos''>Intermediario pagos</option><option value='Por definir''>Por definir</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Metodo de Pago:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="metodoPago" required>
                        <option value="Pago en un sola exhibicion">01 Pago en una sola exhibición</option>
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
        
        <form style="height: 150px;">
            <h2>CFDI Relacionados </h2>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Tipo de Relación:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="tipoRelacion" required>
                        <option value="01">01 Pago en una sola exhibición</option>
                    </select>
                </div>
            </div>
        </form>
        <form style="height: 100px;">
            <h2>Conceptos</h2>
            <div class="form-group">
            <section></section>
            <div class="col-sm-8">
                <input class="btn btn-primary" type="button" value="Agregar" onclick="abrirModal();">
            </div>
        </div>
    </form>
    <div class="contienemodal" id="modal1">
        <div class="modalVisible" id="modal2">
            <form style="height: 480px;">
                <h2>Concepto</h2>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Clave de producto o servicio*:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="claveprod">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Cantidad*:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="cantidad" onkeyup="subtotal();">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Unidad:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="unidad">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Clave Unidad*:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="claveUnidad">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Numero de identificación:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="noIdentificacion">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Descripción:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="descripcion">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Valor Unitario:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="valorU" onkeyup="subtotal();">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Importe*:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="importe" disabled>
                    </div>
                </div><br><br>
            </form>
            <form style="height: 250px;">
                <h2>Impuestos:</h2>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Impuesto*:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="impuesto" value="IVA" disabled>
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Tasa*:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="tasa" value="<?php echo($variables['iva']);?>"" disabled>
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        Importe*:
                    </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="importeTotal" value="Suma de todo con impuesto" disabled>
                    </div>
                </div><br><br>
                <div class="col-sm-4">
                    <input class="btn btn-default" type="button" value="Cerrar" style="float: none;" onclick="cerrarModal(); ">
                </div>
                <div class="col-sm-4">
                    <input class="btn btn-primary" type="button" value="Agregar" style="float: none" onclick="agregarConceptos();">
                </div>
            </form>
        </div>
    </div>
    
    
    
    <form >
        <h2>Resumen:</h2>
        <div class="form-group">
            <label class="col-sm-4 control-label">
                Subtotal*:
            </label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="subtotal" value="subtotal" disabled>
            </div>
        </div><br><br>
        <div class="form-group">
            <label class="col-sm-4 control-label">
                Total de impuestos trasladados*:
            </label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="impuestosTras" value="impuestos trasladados" disabled>
            </div>
        </div><br><br>
        <div class="form-group">
            <label class="col-sm-4 control-label">
                Total*:
            </label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="total" value="total" disabled>
            </div>
        </div><br><br>
        
    </form>
    <div class="col-sm-4" style="position: absolute; right: 20px; width: 250px">
        <input class="btn btn-primary" type="button" value="Guardad Comprobante" style="float: none" onclick="comprobantes(); insertar();">
    </div>
    <h2><a href = "logout.php">Salir</a></h2>
</body>
</html>