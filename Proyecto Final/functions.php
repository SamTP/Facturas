<?php

$variables = parse_ini_file('Config.ini');
session_start();


if (isset($_POST['btnReg'])) {

    registro($variables);

}
if (isset($_POST['btnLog'])) {

    login($variables);

}

function registro($variables)
{
    $server = $variables['ServidorOracle'];
    $uss = $variables['UsuarioOracle'];
    $pass = $variables['PassOracle'];
    $pdo = new PDO("oci:dbname=$server", "$uss", "$pass");

    $rfc = $_POST['rfc'];
    $pass = $_POST['pass'];
    $name=$_POST['name'];

    $query = "INSERT INTO usuario  VALUES('$rfc','$pass','$name')";
    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchAll();
    $pdo = null;
    $_SESSION['login']=true;
    $_SESSION['rfc']=$rfc;
    header("Location: sistema.php");


}

function login($variables){

    $server = $variables['ServidorOracle'];
    $uss = $variables['UsuarioOracle'];
    $pass = $variables['PassOracle'];
    $pdo = new PDO("oci:dbname=$server", "$uss", "$pass");

    $rfc = $_POST['rfc'];
    $pass = $_POST['pass'];
    $query="SELECT pass FROM usuario WHERE rfc='$rfc'";
    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchColumn();
    if($result==$pass){
        $_SESSION['login']=true;
        $_SESSION['rfc']=$rfc;
        header("Location:sistema.php");
    }else{
        print "<script type=\"text/javascript\">";
        print "alert('Usuario o contraseña incorrectos')";
        print "</script>"; 
        include('index.php'); 
    }
    $pdo = null;
    

}




?>