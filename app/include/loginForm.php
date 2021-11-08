<?php

if(isset($_POST['enviar'])){

    $userName = $_POST['usuario'];
    $pswd = $_POST['pswd'];

    require_once "functions.php";

    if(emptyInputLogin($userName, $pswd) !== false){
        header("location: ../account/inicioSesion.php?error=emptyinput");
        exit();
    }

    loginUser($userName, $pswd);


}else{
    header("location: ../account/inicioSesion.php");
    exit();
}