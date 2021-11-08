<?php
require_once "functions.php";

$opcion = $_REQUEST['data'];
$datos = json_decode($opcion);
$url = "exito";

if(emptyEdit($datos) !== false){
    $url = "vacio";
}

if($url == "exito"){
    if(isset($datos->nombre)){
        if(changeUserFirstName($datos) == false){
            $url = "error";
        }
    }
    if(isset($datos->apellidos)){
        if(changeUserLastName($datos) == false){
            $url = "error";
        }
    }
    if(isset($datos->username)){
        if(userNameTaken($datos) != false){
            $url = "no valido";
        }else{
            if(changeUsername($datos) == false){
                $url = "error";
            }
        }
    }
}
echo json_encode($url);
?>