<?php 

require ('LibreriaCon.php');

$variables = parse_ini_file('Config.ini');

session_start();

$rfc = $_GET['rfc'];
$id = $_GET['id'];



    $pdo = conectarMysqlAnx($variables);
    $query = "DELETE FROM comprobante WHERE RFCEmisor = '$rfc' AND idComprobante = '$id';";

    $query = $pdo->prepare($query);
    $query->execute();

 ?>