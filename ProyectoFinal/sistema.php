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
        
        <form action="functions.php" method="post" style="height: 230px;">
            <h2>Datos del emisor</h2>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    RFC:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="rfcEmisor" value="<?php echo($_SESSION['rfc']); ?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Nombre o Razon Social:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="nombreEmisor" value="<?php echo($_SESSION['nombreEmisor']); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Regimen Fiscal:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="regimenFiscal">
                        <option value="" selected>Seleccione...</option>
                         <option value="" selected="">Seleccione...</option>
                    <option value="601">General de Ley Personas Morales</option><option value="603">Personas Morales con Fines no Lucrativos</option><option value="605">Sueldos y Salarios e Ingresos Asimilados a Salarios</option><option value="606">Arrendamiento</option><option value="607">Régimen de Enajenación o Adquisición de Bienes</option><option value="608">Demós ingresos</option><option value="609">Consolidación</option><option value="610">Residentes en el Extranjero sin Establecimiento Permanente en México</option><option value="611">Ingresos por Dividendos (socios y accionistas)</option><option value="612">Personas Físicas con Actividades Empresariales y Profesionales</option><option value="614">Ingresos por intereses</option><option value="615">Régimen de los ingresos por obtención de premios</option><option value="616">Sin obligaciones fiscales</option><option value="620">Sociedades Cooperativas de Producción que optan por diferir sus ingresos</option><option value="621">Incorporación Fiscal</option><option value="622">Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option><option value="623">Opcional para Grupos de Sociedades</option><option value="624">Coordinados</option><option value="628">Hidrocarburos</option><option value="629">De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option><option value="630">Enajenación de acciones en bolsa de valores</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Tipo de Comprobante:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="tipoComprobante">
                        <option value="">Seleccione...</option>
                        <option value="E">Egreso</option>
                        <option value="I">Ingreso</option>
                        <option value="N">Nomina</option>
                        <option value="P">Pago</option>
                        <option value="T">Traslado</option>
                    </select>
                </div>
            </div>
        </form>
        
        <form style="height: 300px;">
            <h2>Datos del Receptor</h2>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    RFC registrado:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="rfcReceptor" placeholder="RFC receptor" onkeyup="receptor()" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Nombre o Razon Social:
                </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="nombreReceptor" placeholder="Nombre del Receptor"disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Residencia Fiscal:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="residenciaFiscal">
                        <option value="residencia">Residencia Fiscal</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Numero de Registro:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="noRegistro">
                        <option value="registro">No. de registro de identidad fiscal</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    Uso de CFDI:
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="cfdi">
                        <option value="" selected>Selecciona...</option>
                        <option value=D01>Honorarios medicos, dentales y gastos hospitalarios.</option>
                        <option value=D02>Gastos medicos por incapacidad o discapacidad</option>
                        <option value=D03>Gastos funerales.</option>
                        <option value=D04>Donativos.</option>
                        <option value=D05>Intereses reales efectivamente pagados por cr?ditos hipotecarios (casa habitaci?n).</option>
                        <option value=D06>Aportaciones voluntarias al SAR.</option>
                        <option value=D07>Primas por seguros de gastos m?dicos.</option>
                        <option value=D08>Gastos de transportaci?n escolar obligatoria.</option>
                        <option value=D09>Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option><option value=D10>Pagos por servicios educativos (colegiaturas)</option>
                        <option value=G01>Adquisición de mercancias</option>
                        <option value=G02>Devoluciones, descuentos o bonificaciones</option>
                        <option value=G03>Gastos en general</option>
                        <option value=I01>Construcciones</option>
                        <option value=I02>Mobilario y equipo de oficina por inversiones</option>
                        <option value=I03>Equipo de transporte</option>
                        <option value=I04>Equipo de computo y accesorios</option>
                        <option value=I05>Dados, troqueles, moldes, matrices y herramental</option>
                        <option value=I06>Comunicaciones telef?nicas</option>
                        <option value=I07>Comunicaciones satelitales</option>
                        <option value=I08>Otra maquinaria y equipo</option>
                        <option value=P01>Por definir</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">
                    .
                </label>
                <div class="col-sm-8">
                    <input type="button" name="siguiente" value="siguiente" onclick="emisorReceptor();" >
                </div>
            </div>
            
        </form>
        <h2><a href = "logout.php">Salir</a></h2>
        <script type="text/javascript">
        //window.addEventListener('load', rellenarReg, true);
        </script>
    </body>
</html>