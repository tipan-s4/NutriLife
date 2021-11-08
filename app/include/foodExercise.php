<?php

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

$aux = new Exercise();
$actividad = $aux->getExercises($_SESSION['userId'], $_SESSION['date']);
$ejercicios = [];

if($actividad){
    foreach($actividad as $a){
        $ex = $aux->getExerciseById($a['idEjercicio']);
        $ex = array_push_assoc($ex,'minutos',$a['minutos']);
        array_push ($ejercicios, $ex);
    }
}


$aux = new Food();
$breakfast = $aux->getBreakfast($_SESSION['userId'], $_SESSION['date']);
$launch = $aux->getLaunch($_SESSION['userId'], $_SESSION['date']);
$dinner = $aux->getDinner($_SESSION['userId'], $_SESSION['date']);
$alimentos = [];


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


$sumaEjercicios = 0;
$sumaAlimentos = 0;

foreach($ejercicios as $ej){
    $sumaEjercicios += intval($ej['calorias']*($ej['minutos']));
}
foreach($alimentos as $a){
    $sumaAlimentos += intval($a['calorias']*($a['cantidad']/100));
}

$aux3 = new User();
$useraux = $aux3->getAuxForm($_SESSION['userId']);
$auxneto = 0;
$restantes = 0; 
$restantesaux = 0;

if(isset($useraux)){
    $userGender = $useraux['genero'];
    if($userGender=='H'){
        $restantes = 2000;
    }else{
        $restantes = 1800;
    }
}
$restantesaux = $restantes-($sumaAlimentos-$sumaEjercicios);
$neto = intval((($sumaAlimentos-$sumaEjercicios)*100)/$restantes);

if ($neto < 0) {
    $auxneto = 0;
}else{
    $auxneto = $neto;
}

$porcentajeAlimentos = intval(($sumaAlimentos*100)/$restantes);
$porcentajeEjercicios = intval(($sumaEjercicios*100)/$restantes);

?>