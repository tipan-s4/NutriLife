<?php
//funciones

if(isset($_POST['enviar'])){

    $age = $_POST['edad'];
    $height = $_POST['altura'];
    $weight = $_POST['peso'];
    $idealw = $_POST['pesoideal'];

    require_once "functions.php";

    if(emptyInputAuxForm($age, $height, $weight, $idealw) !== false){
        header("location: ../account/perfilDieta.php?error=emptyinput");
        exit();
    }
    if(validateAuxForm($age, $height, $weight, $idealw) === false){
        header("location: ../account/perfilDieta.php?error=invalidform");
        exit();
    }
    updateUserAux($age, $height, $weight, $idealw);

}else{
    header("location: ../account/perfilDieta.php");
    exit();
}