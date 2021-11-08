<?php
    session_start();
    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "../class/food.php";
    require_once "../class/exercise.php";

    $aux = new Food();
    $food = $aux->getFoodCount();
    $foods = $aux->getFood();
    $aux2 = new User();
    $users = $aux2->getUsersCount();
    $aux3 = new Exercise();
    $exercise = $aux3->getExerciseCount();
    $exercises = $aux3->getExercise();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css"/>
    <script src="../js/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<div class="container ">
    <?php if(isset($_SESSION['userId'])): ?>
        <header>
            <a href="" class="index"><img src="../images/logo_white_large.png"></a>
            <div class="section sfood addfood">
                <img src="../images/foodicon2.png">
                <p>Añadir<p>
            </div>
            <div class="section sfood delfood">
                <img src="../images/foodicon2.png">
                <p>Eliminar<p>
            </div>
            <div class="section sexe addex">
                <img src="../images/exerciseicon.png">
                <p>Añadir<p>
            </div>
            <div class="section sexe delex">
                <img src="../images/foodicon2.png">
                <p>Eliminar<p>
            </div>
        </header>
        <div class="content">
            <a class="logout" href="../include/logout.php"><img src="../images/power.png"></a>
            <h2>Bienvenido a la vista de administrador</h2>
            <div class="info">
                <div class="card">
                    <img src="../images/usersIcon.png">
                    <p class = "tit">Total Usuarios</p>
                    <?php if(isset($users)): ?>
                        <p class = "count"><?php echo $users ?></p>
                    <?php else:?>
                        <p class = "count">0</p>
                    <?php endif ?>
                </div>
                <div class="card">
                    <img src="../images/foodIcon.png">
                    <p class = "tit">Total Alimentos</p>
                    <?php if(isset($food)): ?>
                        <p class = "count"><?php echo $food ?></p>
                    <?php else:?>
                        <p class = "count">0</p>
                    <?php endif ?>
                </div>
                <div class="card">
                    <img src="../images/iconopesa.png">
                    <p class = "tit">Total Ejercicios</p>
                    <?php if(isset($exercise)): ?>
                        <p class = "count"><?php echo $exercise ?></p>
                    <?php else:?>
                        <p class = "count">0</p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form">
                <div class="add-food">
                    <h4>Añade un alimento</h4>
                    <form action="../include/adminAddFood.php" method="POST">
                        <input type="text" name="nombre" placeholder="Nombre del alimento">
                        <input type="number" name="calorias" placeholder="Calorias">
                        <input type="number" name="hidratos" placeholder="Hidratos">
                        <input type="number" name="proteinas" placeholder="Proteinas">
                        <input type="number" name="grasas" placeholder="grasas">
                        <button type="submit" name="enviar">Guardar</button>
                    </form>
                </div>
                <div class="del-food">
                    <?php if(isset($foods)): ?>
                        <?php foreach ($foods as $f) :?>
                            <div class = "data">
                                <h4><?php echo $f['nombre']?></h4>
                                <p><?php echo $f['idalimentos']?></p>
                                <img src="../images/eliminar.png">
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="msg">
                            <p>Se ha producido un error al cargar los alimentos</p>
                        </div>
                    <?php endif ?>
                </div>
                <div class="add-exercise">
                    <h4>Añade un ejercicio</h4>
                    <form action="../include/adminAddExercise.php" method="POST">
                        <input type="text" name="nombre" placeholder="Nombre del ejercicio">
                        <input type="number" name="calorias" placeholder="Calorias quemadas">
                        <button type="submit" name="enviar">Guardar</button>
                    </form>
                </div>
                <div class="del-ex">
                    <?php if(isset($exercises)): ?>
                        <?php foreach ($exercises as $e) :?>
                            <div class = "data">
                                <h4><?php echo $e['nombre']?></h4>
                                <p><?php echo $e['idEjercicios']?></p>
                                <img src="../images/eliminar.png">
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="msg">
                            <p>Se ha producido un error al cargar los alimentos</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="msg">
            <p>No tienes permiso</p>
        </div>
    <?php endif ?> 
</div> 
</body>
<script>

$(document).ready(function () {
    let ex = $('.addex')
    let food = $('.addfood')
    let delfood = $('.delfood')
    let deled = $('.delex')

    let f = $('.add-food')
    let e = $('.add-exercise')
    let df = $('.del-food')
    let de = $('.del-ex')

    ex.on("click",function(){
        if(de.is(':visible')){
            de.fadeOut(400,function(){e.fadeIn(400)}) 
        }
        if(df.is(':visible')){
            df.fadeOut(400,function(){e.fadeIn(400)}) 
        }
        if(e.is(':visible')){
            f.fadeOut(400,function(){e.fadeIn(400)}) 
        }
    })

    food.on("click",function(){
        if(de.is(':visible')){
            de.fadeOut(400,function(){f.fadeIn(400)}) 
        }
        if(df.is(':visible')){
            df.fadeOut(400,function(){f.fadeIn(400)}) 
        }
        if(f.is(':visible')){
            e.fadeOut(400,function(){f.fadeIn(400)}) 
        }
    })

    delfood.on("click",function(){
        if(de.is(':visible')){
            de.fadeOut(400,function(){df.fadeIn(400)}) 
        }
        if(f.is(':visible')){
            f.fadeOut(400,function(){df.fadeIn(400)}) 
        }
        if(e.is(':visible')){
            e.fadeOut(400,function(){df.fadeIn(400)}) 
        }
    })

    deled.on("click",function(){
        if(df.is(':visible')){
            df.fadeOut(400,function(){de.fadeIn(400)}) 
        }
        if(f.is(':visible')){
            f.fadeOut(400,function(){de.fadeIn(400)}) 
        }
        if(e.is(':visible')){
            e.fadeOut(400,function(){de.fadeIn(400)}) 
        }
    })

})

</script>
<script src="../js/removeAdmin.js"></script>
</html>