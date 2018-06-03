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
// if(function_exists($_GET['f'])) {
//    $_GET['f']($variables);
// }
if(function_exists($_GET['f']) && $_GET['f'] == "receptor") {
   $_GET['f']($variables,$_GET['rfc']);
}else {
   $_GET['f']($variables);
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
    $query="SELECT pass, nombre FROM usuario WHERE rfc='$rfc'";
    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchObject();
    if($result->PASS==$pass){
        $_SESSION['login']=true;
        $_SESSION['rfc']=$rfc;
        $_SESSION['nombreEmisor'] = $result->NOMBRE;
        header("Location:sistema.php");
    }else{
        print "<script type=\"text/javascript\">";
        print "alert('Usuario o contraseña incorrectos')";
        print "</script>"; 
        include('index.php'); 
    }
    $pdo = null;
    

}

function regFiscal($variables){

    $pdo = conectarMysqlCat($variables);

    $query = "SELECT descripcion, c_RegimenFiscal  FROM c_regimenfiscal";
    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchAll();

    $tam = sizeof($result);

    for ($i=0; $i < $tam ; $i++) { 



       echo("<option value=".$result[$i]['c_RegimenFiscal'].">".$result[$i]['descripcion']."</option>");
    

    }

}

function tipoComprobante($variables){

    $pdo = conectarMysqlCat($variables);

    $query = "SELECT c_UsoCFDI, Descripcion FROM c_usocfdi";
    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchAll();

    $tam = sizeof($result);

    for ($i=0; $i < $tam ; $i++) { 



       echo("<option value=".$result[$i]['c_UsoCFDI'].">".$result[$i]['Descripcion']."</option>");
    

    }

}

function receptor($variables, $rfc){

     $pdo = conectarMysqlAnx($variables);

    $query = "SELECT RFC, Nombre FROM receptor WHere RFC = '$rfc';";
    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchObject();
    if ($result) {
        # code...
        echo($result->Nombre);
    }else{
    echo("no");
}


}




?>