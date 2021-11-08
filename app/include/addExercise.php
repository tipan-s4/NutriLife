<?php
//funciones

if(isset($_POST['enviar'])){

    $idUser = $_POST['idUser'];
    $idEx = $_POST['idExercise'];
    $cantidad = $_POST['cantidad'];
    $aux = $_POST['url'];

    require_once "functions.php";

    if($cantidad == null || $cantidad <= 0 || $cantidad > 1440){
        header('location: ../exercise/searchEx.php?search='.$aux.'&msj=err');
        exit();
    }
    addExercise($idUser, $idEx, $cantidad);

}else{
    header("location: ../exercise/ejercicio.php");
    exit();
}