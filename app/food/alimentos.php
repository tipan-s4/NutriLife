<?php require_once '../templates/header.php' ?>
<?php
    require_once '../class/dbc.php';
    require_once '../class/food.php';

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

    $aux = new Food();
    $breakfast = $aux->getBreakfast($_SESSION['userId'], $_SESSION['date']);
    $launch = $aux->getLaunch($_SESSION['userId'], $_SESSION['date']);
    $dinner = $aux->getDinner($_SESSION['userId'], $_SESSION['date']);
    $alimentos = [];
?>
    <div class="content">
        <div class="registro-diario">
            <h4>Tu registro de alimentos para: <h4>
            <form id="envia" method="post">
                <input type="date" name="fecha" id="fecha">
            </form>
        </div>
            <div class="add">
                <div class="desayuno">
                    <div class = "tit">
                        <h3>Desayuno</h3>
                        <div>
                            <p>Calorias</p>
                            <p>Hidratos</p>
                            <p>Proteinas</p>
                            <p>Grasas</p>
                        </div>
                    </div>
                    <?php if ($breakfast) : ?>
                            <?php
                            foreach ($breakfast as $a) {
                                echo '<div class="alimentos">';
                                $food = $aux->getFoodById($a['idAlimento']);
                                echo '<p class="nombre">' . $food['nombre'] . '</p>';
                                echo '<div class="datos">
                                        <p class="pcalorias">'.intval($food['calorias']*($a['cantidad']/100)).'</p>
                                        <p class="phidratos">'.intval($food['hidratos']*($a['cantidad']/100)).'</p>
                                        <p class="pproteinas">'.intval($food['proteinas']*($a['cantidad']/100)).'</p>
                                        <p class="pgrasas">'.intval($food['grasas']*($a['cantidad']/100)).'</p>
                                        <div class="idalimento des">'.$food['idalimentos'].'</div>
                                        <img src="../images/trashicon.png">
                                     </div>
                                     <div class="bottom"></div></div>';
                                array_push($alimentos, $food);
                            }
                            ?>
                    <?php endif ?>
                    <a href="add.php?food=desayuno">
                        <p>Añadir alimento</p>
                    </a>
                </div>
                <div class="comida">
                    <h3>Comida</h3>
                    <?php if ($launch) : ?>
                            <?php
                            foreach ($launch as $a) {
                                echo '<div class="alimentos">';
                                $food = $aux->getFoodById($a['idAlimento']);
                                echo '<p class="nombre">' . $food['nombre'] . '</p>';
                                echo '<div class="datos">
                                        <p class="pcalorias">'.intval($food['calorias']*($a['cantidad']/100)).'</p>
                                        <p class="phidratos">'.intval($food['hidratos']*($a['cantidad']/100)).'</p>
                                        <p class="pproteinas">'.intval($food['proteinas']*($a['cantidad']/100)).'</p>
                                        <p class="pgrasas">'.intval($food['grasas']*($a['cantidad']/100)).'</p>
                                        <div class="idalimento com">'.$food['idalimentos'].'</div>
                                        <img src="../images/trashicon.png">
                                     </div>
                                     <div class="bottom"></div></div>';
                                array_push($alimentos, $food);
                            }
                            ?>
                    <?php endif ?>
                    <a href="add.php?food=comida">
                        <p>Añadir alimento</p>
                    </a>
                </div>
                <div class="cena">
                    <h3>Cena</h3>
                    <?php if ($dinner) : ?>
                            <?php
                            foreach ($dinner as $a) {
                                echo '<div class="alimentos">';
                                $food = $aux->getFoodById($a['idAlimento']);
                                echo '<p class="nombre">' . $food['nombre'] . '</p>';
                                echo '<div class="datos">
                                        <p class="pcalorias">'.intval($food['calorias']*($a['cantidad']/100)).'</p>
                                        <p class="phidratos">'.intval($food['hidratos']*($a['cantidad']/100)).'</p>
                                        <p class="pproteinas">'.intval($food['proteinas']*($a['cantidad']/100)).'</p>
                                        <p class="pgrasas">'.intval($food['grasas']*($a['cantidad']/100)).'</p>
                                        <div class="idalimento cena">'.$food['idalimentos'].'</div>
                                        <img src="../images/trashicon.png">
                                     </div>
                                     <div class="bottom"></div></div>';
                                array_push($alimentos, $food);
                            }
                            ?>
                    <?php endif ?>
                    <a href="add.php?food=cena">
                        <p>Añadir alimento</p>
                    </a>
                </div>
            </div>
            <?php
                $error = "";
                if(isset($_GET['msj'])){
                    if($_GET['msj']=="fail"){
                        $error = 'No se ha podido añadir el alimento';
                    }
                    if($_GET['msj']=="err"){
                        $error = 'No se ha podido borrar el alimento';
                    }
                    if($_GET['msj']=="invalidData"){
                        $error = 'El valor introducido no es válido';
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

let datos = document.querySelectorAll('.datos');

datos.forEach(el=>{
    let button = el.querySelector('img')
    button.addEventListener("click",function(){
        let tipo;
        let id = el.querySelector('.idalimento');
        idalimento = id.textContent

        if(id.classList.contains('des')){
            tipo = 'desayuno';
        }
        if(id.classList.contains('com')){
            tipo = 'comida'
        }
        if(id.classList.contains('cena')){
            tipo = 'cena';
        }

        let url = "../include/deleteFood.php";
        let params = {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'data=' + JSON.stringify({tipo:tipo, id:idalimento})
        }
        fetch(url,params)
        .then(function(respuesta){
            return respuesta.json();
        }).then(function(datos){
            location.replace(datos)
        })
    })
})

</script>
</html>