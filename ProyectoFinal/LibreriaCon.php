<?php

function conectarMysqlCat($variables){

    $server = $variables['ServidorMySQL'];
    $uss = $variables['UsuarioMySQL'];
    $pass = $variables['PassMySQL'];
    $db=$variables['DBMySQL'];

    $pdo = new PDO("mysql:host=$server;dbname=$db","$uss","$pass");
    return $pdo;


}
function conectarMysqlAnx($variables){

    $server = $variables['ServidorMySQL'];
    $uss = $variables['UsuarioMysQL'];
    $pass = $variables['PassMySQL'];
    $db=$variables['DBMySQL2'];

    $pdo=new PDO("mysql:host=$server;dbname=$db","$uss","$pass");

    return $pdo;

}

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
