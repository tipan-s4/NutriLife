<?php
require_once "functions.php";

$opcion = json_decode($_REQUEST['data']);

if(isset($opcion)){
    if($opcion->tipo == "desayuno"){
        $url = removeBreakfast($opcion->id);
        echo json_encode($url);
    }
    if($opcion->tipo == "comida"){
        $url = removeLaunch($opcion->id);
        echo json_encode($url);
    }
    if($opcion->tipo == "cena"){
        $url = removeDinner($opcion->id);
        echo json_encode($url);
    }
}


?>