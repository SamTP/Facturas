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

if(function_exists($_GET['f']) && $_GET['f'] == "receptor") {
   $_GET['f']($variables,$_GET['rfc']);
}else{
   $_GET['f']($variables);
}



function registro($variables)
{
    
    $pdo = conectarMysqlAnx($variables);
    $rfc = $_POST['rfc'];
    $res = $_POST['res'];
    $name=$_POST['name'];
    $num=$_POST['num'];
    $query = "INSERT INTO receptor  VALUES('$rfc','$name','$res','$num',1)";
    $result=exeQuery($pdo,$query);
    desconectar($pdo);
  
    header("Location: menu.php");


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
        header("Location:menu.php");
    }else{
        print "<script type=\"text/javascript\">";
        print "alert('Usuario o contraseña incorrectos')";
        print "</script>"; 
        include('index.php'); 
    }
    $pdo = null;
    

}

//innecessarias
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

    $query = "SELECT RFC, Nombre, ResidenciaFiscal, NumRegIdTrib FROM receptor WHERE RFC = '$rfc';";
    $query = $pdo->prepare($query);
    $query->execute();
    $result = $query->fetchAll();
    if ($result) {
        echo json_encode($result);
    }else{
    echo("no");
    }


}


function guardarER($variables,$rfcEmisor,$rfcReceptor,$cfdi,$nombreEmisor,$nombreReceptor,$regimen,$residencia,$tipoC,$noR){

    $pdo = conectarMysqlAnx($variables);

    $query = "INSERT INTO  emisor  VALUES ('$rfcEmisor', '$nombreEmisor', '$regimen');";
    $query = $pdo->prepare($query);
    $query->execute();

    $quer2 = "INSERT INTO  receptor  VALUES ('$rfcEmisor', '$nombreEmisor', '$regimen');";
    $query2 = $pdo->prepare($query);
    $query2->execute();



}



?>