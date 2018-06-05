<?php 

require ('LibreriaCon.php');

$variables = parse_ini_file('Config.ini');

session_start();

$rfc = $_GET['rfc'];



    $pdo = conectarMysqlAnx($variables);
    $query = "SELECT * FROM comprobante WHERE RFCEmisor = '$rfc';";

    $query = $pdo->prepare($query);
    $query->execute();
     $result = $query->fetchAll();

  // echo(sizeof($result));
   for ($i=0; $i < sizeof($result) ; $i++) { 




   	echo(
            "<h2>".($i+1).".-</h2>".
            "<div class='form-group'>".
                "<label class='col-sm-4 control-label'>".
                   "Folio Fiscal:".
                "</label>".
                "<div class='col-sm-8'>".
                    "<input class='form-control' type='text' id='subtotal' value=".$result[$i]['Folio']." disabled>".
                "</div>".
            "</div><br><br>".

            "<div class='form-group'>".
                "<label class='col-sm-4 control-label'>".
                   "RFC Receptor:".
                "</label>".
                "<div class='col-sm-8'>".
                    "<input class='form-control' type='text' id='subtotal' value=".$result[$i]['RFCReceptor']." disabled>".
                "</div>".
            "</div><br><br>".

            "<div class='form-group'>".
                "<label class='col-sm-4 control-label'>".
                   "Fecha de Emision:".
                "</label>".
                "<div class='col-sm-8'>".
                    "<input class='form-control' type='text' id='subtotal' value=".$result[$i]['Fecha']." disabled>".
                "</div>".
            "</div><br><br>".

            "<div class='form-group'>".
                "<label class='col-sm-4 control-label'>".
                   "Fecha de Certificación:".
                "</label>".
                "<div class='col-sm-8'>".
                    "<input class='form-control' type='text' id='subtotal' value=".$result[$i]['Fecha']." disabled>".
                "</div>".
            "</div><br><br>".

            "<div class='form-group'>".
                "<label class='col-sm-4 control-label'>".
                   "Efecto:".
                "</label>".
                "<div class='col-sm-8'>".
                    "<input class='form-control' type='text' id='subtotal' value=".(1)." disabled>".
                "</div>".
            "</div><br><br>".

            "<div class='form-group'>".
                "<label class='col-sm-4 control-label'>".
                   "Total:".
                "</label>".
                "<div class='col-sm-8'>".
                    "<input class='form-control' type='text' id='subtotal' value=".$result[$i]['Total']." disabled>".
                "</div>".
                "<h2><a onclick=eliminar(".$result[$i]['idComprobante'].")>Eliminar</a></h2>".
            "</div><br><br>"
           
        );

   
   }

     
 ?>