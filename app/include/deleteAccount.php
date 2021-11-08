<?php
if(isset($_POST['borrar'])){

    require_once "functions.php";
    
    deleteUser($_SESSION['userId']);
    session_start();
    session_unset();
    session_destroy();
    header("location: ../index.php");
    exit();

}else{
    header("location: ../account/eliminarCuenta.php");
    exit();
}