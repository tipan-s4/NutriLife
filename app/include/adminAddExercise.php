<?php
//funciones

if(isset($_POST['enviar'])){

    $name = $_POST['nombre'];
    $calorias = $_POST['calorias'];

    require_once "functions.php";

    if(emptyInputAdminEx($name, $calorias) !== false){
        header("location: ../admin/admin.php?error=emptyinput");
        exit();
    }
    if(exerciseExists($name) != false || exerciseExists($name) != null){
        header("location: ../admin/admin.php?error=usernametaken");
        exit();
    } 
    addExerciseAdmin($name, $calorias);

}else{
    header("location: ../admin/admin.php");
    exit();
}