<?php require_once '../templates/header.php' ?>
<?php
    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "../class/food.php";

    $msj = "";
    if (isset($_GET['search'])) {
        if ($_GET['search'] == 'Calorias') {
            $aux2 = new Food();
            $foods = $aux2->getFoodOrderByCalories();
        }
        else if ($_GET['search'] == 'Hidratos') {
            $aux2 = new Food();
            $foods = $aux2->getFoodOrderByHydrates();
        }
        else if ($_GET['search'] == 'Proteinas') {
            $aux2 = new Food();
            $foods = $aux2->getFoodOrderByProtein();
        }
        else if ($_GET['search'] == 'Grasas') {
            $aux2 = new Food();
            $foods = $aux2->getFoodOrderByFat();
        }
        else{
            $aux2 = new Food();
            $msj = $_GET['search'];
            $foods = $aux2->getFoodByName($msj);
        }
    }
?>
<div class="content">
    <?php if ($foods) : ?>
        <?php if ($msj): ?>
        <div class="food-search">
            <h3>Búsqueda nuestra base de datos de alimentos por nombre: </h3>
            <input type="text" value="<?php echo $msj ?>" readonly>
            <h3>Resultados coincidentes</h3>
        </div>
        <?php endif ?>
        <div class="search-flex">
            <div class="resultado">
                <?php foreach ($foods as $food) : ?>
                    <div class="food">
                        <div class="preview">
                            <h4><?php echo $food['nombre'] ?></h4>
                            <p>100g | <?php echo $food['calorias'] ?> Kcal | ... </p>
                        </div>
                        <div class="resultados">
                            <div class="tit">
                                <h4><?php echo $food['nombre'] ?>  (100g)</h4>
                            </div>
                            <div class="data-search">
                                <p>Calorias : <?php echo $food['calorias'] ?></p>
                                <p>Hidratos : <?php echo $food['hidratos'] ?></p>
                                <p>Proteinas : <?php echo $food['proteinas'] ?></p>
                                <p>Grasas : <?php echo $food['grasas'] ?></p>
                            </div>
                        </div>
                    <form action="../include/addFood.php" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION["userId"] ?>">
                        <input type="hidden" name="idFood" value="<?php echo $food['idalimentos'] ?>">
                        <input type="hidden" name="tipo" value="<?php echo $_GET['food'] ?>">
                        <input type="hidden" name="url" value="<?php echo $msj ?>">
                        <input type="number" name="cantidad" placeholder="Introduce la cantidad (gr)">
                        <button type="submit" name="enviar" class="botonEnviar">Añadir</button>
                        <p class="copy-cancel">Cancelar</p>
                    </form>
                    </div>
                <?php endforeach ?>
            </div>
            <div class = "copy-food"></div>
        </div>
    <?php else : ?>
        <div class="msg">
            <p class="bold white">No se encuentra dicho alimento en nuestra base de datos</p>
        </div>
    <?php endif ?>
</div>
<?php require_once '../templates/footer.php' ?>
<script>
    let foods = document.querySelectorAll('.food')
    let div = document.querySelector('.copy-food')

    foods.forEach(el=>{
        el.addEventListener("click",function(){
            div.textContent = ""
            let form = el.querySelector('form')
            let res = el.querySelector('.resultados')
            let cloneform = form.cloneNode(true)
            let clone = res.cloneNode(true)
            div.appendChild(clone)
            div.appendChild(cloneform)
        })
    })
</script>
<script>
    let fhide = $('.resultado')

    if($( window ).width() <= 600){
        fhide.on("click",function(){
            $(fhide).hide(function(){
                $('.copy-food').show();
                let chide = $('.copy-food .copy-cancel')
                chide.on("click",function(){
                $('.copy-food').hide();
                fhide.show(400);
                })
            });
        })
    }
</script>
</html>