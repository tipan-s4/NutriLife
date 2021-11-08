<?php require_once '../templates/header.php' ?>
<?php
    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "../class/exercise.php";

    $msj = "";
    if (isset($_GET['search'])) {
        if ($_GET['search'] != "") {
            $aux2 = new Exercise();
            $msj = $_GET['search'];
            $ex = $aux2->getExerciseByName($msj);
        }
    }
?>
<div class="content">
    <?php if ($ex) : ?>
        <div class="exercise-search">
            <h3>Búsqueda nuestra base de datos de alimentos por nombre: </h3>
            <input type="text" value="<?php echo $msj ?>" readonly>
            <h3>Resultados coincidentes</h3>
        </div>
        <div class="search-flex">
            <div class="table-exercise">
                <div class="table-exercise-header">
                    <h3>Nombre</h3>
                    <h3>Calorias</h3>
                    <h3>Minutos</h3>
                </div>
                <?php foreach ($ex as $e) : ?>
                    <form action="../include/addExercise.php" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION["userId"] ?>">
                        <input type="hidden" name="idExercise" value="<?php echo $e['idEjercicios'] ?>">
                        <input type="hidden" name="url" value="<?php echo $msj ?>">
                        <div><h3 class="table-exercise-tit">Nombre</h3><h4><?php echo $e['nombre'];?></h4></div>
                        <div><h3 class="table-exercise-tit">Calorias</h3><p><?php echo $e['calorias'];?></p></div>
                        <div><h3 class="table-exercise-tit">Minutos</h3><input type="number" name="cantidad"></div>
                        <div><button type="submit" name="enviar" class="botonEnviar">Añadir</button></div>
                    </form>
                <?php endforeach ?>
            </div>
        </div>
        <?php
            $error = "";
            if(isset($_GET['msj'])){
                if($_GET['msj']=="err"){
                    $error = 'El valor introducido no es válido';
                }
            }
        ?>
        <div class="msg">
            <p><?php echo $error?></p>
        </div>
    <?php else : ?>
        <div class="msg">
            <p class="bold white">No se encuentra dicho ejercicio en nuestra base de datos</p>
        </div>
    <?php endif ?>
</div>
<?php require_once '../templates/footer.php' ?>
</html>