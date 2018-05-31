<?php

    session_start();

    if($_SESSION['login']==false){
        header('Location:index.php');
    }

?>