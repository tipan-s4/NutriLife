<?php
session_start();
require_once "../class/dbc.php";
require_once "../class/user.php";
require_once "../class/food.php";
require_once "../class/exercise.php";

//REGISTER
function emptyInputSignup($name,$lastName, $userName, $email, $pswd){
    $result=null;
    if(empty($name) || empty($lastName) || empty($userName) || empty($email) || empty($pswd)){
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function uidExists($userName , $email){
     $user = new User();
     return $user->getUser($userName , $email);
}

function createUser($name, $lastName, $userName, $email, $pswd){
    $user = new User();
    if($user->createUsers($name, $lastName, $userName, $email, $pswd)){
        loginUser($userName, $pswd);
    }else{
        header("location: ../account/registro.php?error=stmtfailed");
        exit();
    }
}


//LOGIN

function emptyInputLogin($userName, $pswd){
    $result=null;
    if(empty($userName) || empty($pswd))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function loginUser($userName, $pswd){
    $uidExist =  uidExists($userName , $userName);
    if($uidExist===false || $uidExist===null){
        header("location: ../account/inicioSesion.php?error=wronglogin");
        exit();
    }
    else{
        if($uidExist['admin'] == 'S'){
            if($uidExist["userPswd"] == $pswd){
                $_SESSION['userId'] = $uidExist["idUser"];
                header("location: ../admin/admin.php");
                exit();
            }else{
                header("location: ../account/inicioSesion.php?error=wronglogin");
                exit();
            }
        }
        
        $pswdHashed = $uidExist["userPswd"];
        $checkPwd = password_verify($pswd, $pswdHashed);

        if($checkPwd===false){
            header("location: ../account/inicioSesion.php?error=wronglogin");
            exit();
        }
        $_SESSION['userId'] = $uidExist["idUser"];
        $_SESSION['userUid'] = $uidExist["nombreUser"];
        header("location: ../index.php");
        exit();
    }
}


// ELIMINAR USUARIO

function deleteUser($id){
    $user = new User();
    if($user->deleteAccount($id)){
        header("location: ../index.php");
        exit();
    }else{
        header("location: ../account/eliminarCuenta.php?error=stmtfailed");
        exit();
    }
}

// FORMULARIO PESO, EDAD Y ALTURA

function emptyInputAuxForm($age, $height, $weight, $idealw){
    $result=null;
    if(empty($age)  || empty($height)  || empty($weight) || empty($idealw))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function validateAuxForm($age, $height, $weight, $idealw){
    if($age < 15 || $age > 80){
        return false;
    }
    if($height < 100 || $height > 250){
        return false;
    }
    if($weight < 30 || $weight > 300){
        return false;
    }
    if($idealw < 30 || $idealw > 300){
        if($idealw == $weight){
            return false;
        }
    }
    return true;
}

function createUserAux($age, $height, $weight, $idealw, $gender){
    $auxId =  $_SESSION['userId'];
    $user = new User();
    if($user->createUsersAux($age, $height, $weight, $idealw, $gender, $auxId)){
        if($user->finishAuxForm($auxId)){
            header("location: ../index.php?msj=exito");
            exit();
        }else{
            header("location: ../index.php?error=stmtfailed");
        exit();
        }
    }else{
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
}

function updateUserAux($age, $height, $weight, $idealw){
    $auxId =  $_SESSION['userId'];
    $user = new User();
    if($user->updateAuxForm($age, $height, $weight, $idealw, $auxId)){
        header("location: ../account/perfilDieta.php");
        exit();
    }else{
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
}


// Editar datos de usuario

function emptyEdit($data){
    $vacio = 0;
    if(isset($data->nombre)){
        if($data->nombre == ""){
            $vacio++;
        }
    }
    if(isset($data->apellidos)){
        if($data->apellidos == ""){
            $vacio++;
        }
    }
    if(isset($data->username)){
        if($data->username == ""){
            $vacio++;
        }
    }
    if($vacio == 0){
        return false;
    }else{
        return true;
    }
}

function userNameTaken($data){
    $user = new User();
    $uidExist = $user->getUserByUsername($data->username);
    if($uidExist === false || $uidExist === null){
        return false;
    }else{
        return true;
    }
}


function changeUserFirstName($data){
    $user = new User();
    if($user->updateUserFirstName($data->nombre, $_SESSION['userId'])){
        return true;
    }else{
        return false;
    }
}

function changeUserLastName($data){
    $user = new User();
    if($user->updateUserLastName($data->apellidos, $_SESSION['userId'])){
        return true;
    }else{
        return false;
    }
}

function changeUsername($data){
    $user = new User();
    if($user->updateUsername($data->username, $_SESSION['userId'])){
        return true;
    }else{
        return false;
    }
}



// Consultar todos los alimentos filtrados por una caracteristica

function filterBreakfast($order){
    if($order == "calorias"){
        header("location: ../food/search.php?search=Calorias&food=desayuno");
        exit();
    }else if($order == "hidratos"){
        header("location: ../food/search.php?search=Hidratos&food=desayuno");
        exit();
    }else if($order == "proteinas"){
        header("location: ../food/search.php?search=Proteinas&food=desayuno");
        exit();
    }else{
        header("location: ../food/search.php?search=Grasas&food=desayuno");
        exit();
    }
}

function filterLaunch($order){
    if($order == "calorias"){
        header("location: ../food/search.php?search=Calorias&food=comida");
        exit();
    }else if($order == "hidratos"){
        header("location: ../food/search.php?search=Hidratos&food=comida");
        exit();
    }else if($order == "proteinas"){
        header("location: ../food/search.php?search=Proteinas&food=comida");
        exit();
    }else{
        header("location: ../food/search.php?search=Grasas&food=comida");
        exit();
    }
}

function filterDinner($order){
    if($order == "calorias"){
        header("location: ../food/search.php?search=Calorias&food=cena");
        exit();
    }else if($order == "hidratos"){
        header("location: ../food/search.php?search=Hidratos&food=cena");
        exit();
    }else if($order == "proteinas"){
        header("location: ../food/search.php?search=Proteinas&food=cena");
        exit();
    }else{
        header("location: ../food/search.php?search=Grasas&food=cena");
        exit();
    }
}



// Añadir desayuno

function addBreakfast($idUser, $idFood, $cantidad){
    $food = new Food();
    if($food->addToBreakfast($idUser, $idFood, $_SESSION['date'], $cantidad)){
        header("location: ../food/alimentos.php");
        exit();
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }
}

function removeBreakfast($idFood){
    $food = new Food();
    if($food->removeFromBreakfast($_SESSION['userId'], $idFood, $_SESSION['date'])){
        return "alimentos.php";
    }else{
        return "alimentos.php?msj=err";
    }
}

function addLaunch($idUser, $idFood, $cantidad){
    $food = new Food();
    if($food->addToLaunch($idUser, $idFood, $_SESSION['date'], $cantidad)){
        header("location: ../food/alimentos.php");
        exit();
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }
}


function removeLaunch($idFood){
    $food = new Food();
    if($food->removeFromLaunch($_SESSION['userId'], $idFood, $_SESSION['date'])){
        return "alimentos.php";
    }else{
        return "alimentos.php?msj=err";
    }
}

function addDinner($idUser, $idFood, $cantidad){
    $food = new Food();
    if($food->addToDinner($idUser, $idFood, $_SESSION['date'], $cantidad)){
        header("location: ../food/alimentos.php");
        exit();
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }
}

function removeDinner($idFood){
    $food = new Food();
    if($food->removeFromDinner($_SESSION['userId'], $idFood, $_SESSION['date'])){
        return "alimentos.php";
    }else{
        return "alimentos.php?msj=err";
    }
}


// ADMINISTRADOR

function emptyInputAdmin($name, $calorias, $hidratos, $proteinas, $grasas){
    $result=null;
    if(empty($name) || empty($calorias) || empty($hidratos) || empty($proteinas) || empty($grasas))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function emptyInputAdminEx($name, $calorias){
    $result=null;
    if(empty($name) || empty($calorias))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function exerciseExists($name){
    $ex = new Exercise();
    return $ex->checkExerciseByName($name);
}

function foodExists($name){
    $food = new Food();
    return $food->checkFoodByName($name);
}

function addExerciseAdmin($name, $calorias){
    $ex = new Exercise();
    if($ex->addExerciseAdmin($name, $calorias)){
        header("location: ../admin/admin.php?msj=added");
        exit();
    }else{
        header("location: ../admin/admin.php?msj=fail");
        exit();
    }
}

function addFoodAdmin($name, $calorias, $hidratos, $proteinas, $grasas){
    $food = new Food();
    if($food->addFood($name, $calorias, $hidratos, $proteinas, $grasas)){
        header("location: ../admin/admin.php?msj=added");
        exit();
    }else{
        header("location: ../admin/admin.php?msj=fail");
        exit();
    }
}

function removeFoodAdmin($id){
    $food = new Food();
    if($food->deleteFoodAdmin($id)){
        return "admin.php";
    }else{
        return "admin.php?msj=err";
    }
}

function removeExerciseAdmin($id){
    $ex = new Exercise();
    if($ex->deleteExerciseAdmin($id)){
        return "admin.php";
    }else{
        return "admin.php?msj=err";
    }
}

// EJERCICIOS

function addExercise($idUser, $idEx, $cantidad){
    $ex = new Exercise();
    if($ex->addExerciseUser($idEx, $idUser, $_SESSION['date'], $cantidad)){
        header("location: ../exercise/ejercicio.php");
        exit();
    }else{
        header("location: ../exercise/ejercicio.php?msj=fail");
        exit();
    }
}

function removeExercise($idEx){
    $ex = new Exercise();
    if($ex->deleteExercise($_SESSION['userId'], $idEx, $_SESSION['date'])){
        return "ejercicio.php";
    }else{
        return "ejercicio.php?msj=err";
    }
}