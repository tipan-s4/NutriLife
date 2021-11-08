<?php require_once '../templates/header.php'?>
<div class="add-image-ali queryhide">
    <div class="content nochanges">
        <div class = "search-food">
            <div class="titulo">
                <h3>Busca un determinado alimento</h3>
            </div>
            <div class="wrapper">
                    <div class="search-input">
                        <input type="text" name="alimento" id="alimento" placeholder="Busca un alimento">
                        <ul id="palabras"></ul>
                        <div class="icon"></div>
                    </div>
            </div>
            <div class="titulo">
                <h3>o consulta todos los alimentos ordenados por :</h3>  
            </div>
            <div class="db-alimentos">
                <form action="../include/filterFood.php" method="POST">
                <div>
                    <label>
                        <input type="radio" name="order" value="calorias" checked="checked" > Calorias
                    </label>    
                    <label>
                        <input type="radio" name="order" value="hidratos"> Hidratos
                    </label> 
                    <label>
                        <input type="radio" name="order" value="proteinas"> Proteinas
                    </label> 
                    <label>
                        <input type="radio" name="order" value="grasas"> Grasas
                    </label> 
                    <input type="hidden" name="tipo" value="<?php echo $_GET['food'] ?>">
                </div> 
                <button type="submit" name="enviar">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once '../templates/footer.php'?>
<script src="../js/add.js"></script>
</html>