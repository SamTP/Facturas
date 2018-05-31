<?php
require ('LibreriaCon.php');

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
    
    $pdo = conectarOracle($variables);
    $rfc = $_POST['rfc'];
    $pass = $_POST['pass'];
    $name=$_POST['name'];
    $query = "INSERT INTO usuario  VALUES('$rfc','$pass','$name')";
    $result=exeQuery($pdo,$query);
    desconectar($pdo);
    $_SESSION['login']=true;
    $_SESSION['rfc']=$rfc;
    header("Location: sistema.php");


}

function login($variables){


    $pdo = conectarOracle($variables);

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