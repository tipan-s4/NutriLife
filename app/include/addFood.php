<?php
//funciones

if(isset($_POST['enviar'])){

    $idUser = $_POST['idUser'];
    $idFood = $_POST['idFood'];
    $type = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];

    require_once "functions.php";

    if($cantidad==null || $cantidad <= 0 || $cantidad > 5000){
        header("location: ../food/alimentos.php?msj=invalidData");
        exit();
    }
    if($type == 'desayuno'){
        addBreakfast($idUser, $idFood, $cantidad);
    }
    else if($type == 'comida'){
        addLaunch($idUser, $idFood, $cantidad);
    }
    else if($type == 'cena'){
        addDinner($idUser, $idFood, $cantidad);
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }

}else{
    header("location: ../food/alimentos.php");
    exit();
}