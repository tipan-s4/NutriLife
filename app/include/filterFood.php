<?php
//funciones

if(isset($_POST['enviar'])){

    $order = $_POST['order'];
    $type = $_POST['tipo'];

    require_once "functions.php";

    if($type == 'desayuno'){
        filterBreakfast($order);
    }
    else if($type == 'comida'){
        filterLaunch($order);
    }
    else if($type == 'cena'){
        filterDinner($order);
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }

}else{
    header("location: ../food/alimentos.php");
    exit();
}