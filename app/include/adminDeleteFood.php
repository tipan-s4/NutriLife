<?php

require_once "functions.php";

$opcion = json_decode($_REQUEST['data']);

if(isset($opcion)){
    $url = removeFoodAdmin($opcion->id);
    echo json_encode($url);
}

?>