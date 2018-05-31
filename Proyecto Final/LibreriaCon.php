<?php

function conectarOracle($variables){

    $server = $variables['ServidorOracle'];
    $uss = $variables['UsuarioOracle'];
    $pass = $variables['PassOracle'];

    $pdo = new PDO("oci:dbname=$server", "$uss", "$pass");

    return $pdo;
}

function exeQuery($pdo,$query){

    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchAll();
    return $result;

}

function desconectar($pdo){
    $pdo=null;
}


?>
