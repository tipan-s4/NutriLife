<?php
//funciones

if(isset($_POST['enviar'])){

    $age = $_POST['edad'];
    $height = $_POST['altura'];
    $weight = $_POST['peso'];
    $idealw = $_POST['pesoideal'];
    $gender = $_POST['gender'];

    require_once "functions.php";

    if(emptyInputAuxForm($age, $height, $weight, $idealw) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if(validateAuxForm($age, $height, $weight, $idealw) === false){
        header("location: ../index.php?error=invalidform");
        exit();
    }
    createUserAux($age, $height, $weight, $idealw, $gender);

}else{
    header("location: ../index.php");
    exit();
}