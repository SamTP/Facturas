<?php
    $_SESSION['login']=false;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta lang="es" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Facturas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="estilos.css" />
    <script src="funciones.js"></script>
</head>

<body>

    <p>
        <h2>Login</h2>
    </p>
    <form method="POST" action="functions.php" name="formLgn">
        <p>
            <input type="text" name="rfc" max="15" placeholder="RFC" required>
        </p>
        <p>
            <input type="password" name="pass" max="16" placeholder="Contraseña" required>
        </p>
        <p>
            <input type="submit" name="btnLog" value="Entrar">
        </p>
    </form>
    <p>
        <input type="button"  onclick="location.href='registro.html'"; name="btnReg" value="Registrarse" >
    </p>
</body>
<footer>
    <h6>
        Proyecto Final DAAD SOF11
    </h6>
</footer>

</html>