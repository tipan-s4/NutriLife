<?php

session_start();
require_once '../class/dbc.php';
require_once '../class/food.php';

$aux = new Food();
$breakfast = $aux->getBreakfast($_SESSION['userId'], $_SESSION['date']);
$launch = $aux->getLaunch($_SESSION['userId'], $_SESSION['date']);
$dinner = $aux->getDinner($_SESSION['userId'], $_SESSION['date']);
$alimentos = [];

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

if($breakfast){
    foreach($breakfast as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

if($launch){
    foreach($launch as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

if($dinner){
    foreach($dinner as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

echo json_encode($alimentos)

?>