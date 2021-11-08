<?php

$auxdate = getdate();
$year = $auxdate['year'];
$month = $auxdate['mon'];
$day = $auxdate['mday'];
$date = "$year-$month-$day";
$_SESSION['date'] = $date;

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

$aux3 = new User();
$useraux = $aux3->getAuxForm($_SESSION['userId']);

if(isset($useraux)){
    $userGender = $useraux['genero'];
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


$aux2 = new Food();
$breakfast = $aux2->getBreakfast($_SESSION['userId'], $_SESSION['date']);
$launch = $aux2->getLaunch($_SESSION['userId'], $_SESSION['date']);
$dinner = $aux2->getDinner($_SESSION['userId'], $_SESSION['date']);
$alimentos = [];
$foodCount = 0;

if(is_countable($breakfast)) {
    $foodCount += count($breakfast);
}
if(is_countable($launch)) {
    $foodCount += count($breakfast);
}
if(is_countable($dinner)) {
    $foodCount += count($breakfast);
}      

if($breakfast){
    foreach($breakfast as $a){
        $food = $aux2->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

if($launch){
    foreach($launch as $a){
        $food = $aux2->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

if($dinner){
    foreach($dinner as $a){
        $food = $aux2->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

// Sumamos las calorias totales de los ejercicios y los alimentos

$sumaEjercicios = 0;
$sumaAlimentos = 0;

foreach($ejercicios as $ej){
    $sumaEjercicios += intval($ej['calorias']*($ej['minutos']));
}
foreach($alimentos as $a){
    $sumaAlimentos += intval($a['calorias']*($a['cantidad']/100));
}

$neto = $sumaAlimentos-$sumaEjercicios;