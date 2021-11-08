<?php require_once '../templates/header.php' ?>
<?php
    require_once '../class/dbc.php';
    require_once '../class/exercise.php';

    if(isset($_GET['date'])){
        $_SESSION['date'] = $_GET['date'];
    }else{
        $auxdate = getdate();
        $year = $auxdate['year'];
        $month = $auxdate['mon'];
        $day = $auxdate['mday'];
        $date = "$year-$month-$day";
        $_SESSION['date'] = $date;
    }
    $aux = new Exercise();
    $exercise = $aux->getExercises($_SESSION['userId'], $_SESSION['date']);
    // Lo podemos usar para añadir la suma de los alimentos
    $ejercicios = [];
?>
    <div class="content">
        <div class="registro-diario">
            <h4>Tu registro de ejercicios para: <h4>
            <form id="envia" method="post">
                <input type="date" name="fecha" id="fecha">
            </form>
        </div>
        <div class="add">
            <div class="desayuno">
                <div class="tit">
                    <h3>Ejercicio</h3>
                    <div>
                        <p>Calorias</p>
                        <p>Minutos</p>
                        <p>Resultado</p>
                    </div>
                </div>
            </div>
            <?php if ($exercise) : ?>
                <?php
                    foreach ($exercise as $e) {
                        echo '<div class="ejercicios">';
                        $ex = $aux->getExerciseById($e['idEjercicio']);
                        echo '<p class="nombre">' . $ex['nombre'] . '</p>';
                        echo '<div class="datos">
                                <p class="pcalorias">'.$ex['calorias'].'</p>
                                <p class="pminutos">'.$e['minutos'].'</p>
                                <p class="ptotal">'.intval($ex['calorias']*($e['minutos'])).'</p>
                                <div class="idejercicio">'.$e['idActividad'].'</div>
                                <img src="../images/trashicon.png">
                                </div>
                                <div class="bottom"></div></div>';
                        array_push($ejercicios, $ex);
                    }
                ?>
            <?php endif ?>
            <div class="add-ex">
                <p>Añadir ejercicio</p>
            </div>
        </div>
        <div class="search-exercise">
            <div class="wrapper">
                    <div class="search-input">
                        <input type="text" name="alimento" id="ejercicio" placeholder="Busca un ejercicio">
                        <ul id="palabras"></ul>
                        <div class="icon"></div>
                    </div>
            </div>
        </div>
        <?php
            $error = "";
            if(isset($_GET['msj'])){
                if($_GET['msj']=="fail"){
                    $error = 'No se ha podido añadir el ejercicio';
                }
                if($_GET['msj']=="err"){
                    $error = 'No se ha podido borrar el ejercicio';
                }
            }
        ?>
        <div class="msg">
            <p><?php echo $error?></p>
        </div>
    </div>
<?php require_once '../templates/footer.php' ?>
<script src="../js/calendario.js"></script>
<script>
$(document).ready(function () {
    const add = $('.add-ex p')
    const search = $('.wrapper')

    add.on("click",function(){
        search.toggle(400)
    })
})
</script>
<script src="../js/addExercise.js"></script>
<script src="../js/removeExercise.js"></script>
</html>