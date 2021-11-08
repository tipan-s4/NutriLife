<?php 
include('../templates/header.php'); 
require_once '../class/dbc.php';
require_once '../class/user.php';
    //detalles de cada usuario
    if(isset($_SESSION['userId'])){

        $id = $_SESSION['userId'];
        $aux = new User();
        $data = $aux->getAuxForm($id);
    }
?>
<?php require_once '../templates/sidebar.php' ?>
    <div class="settings-aux2">
        <div class = "content slight nochanges">
            <h4 class = "titulo">Ajustes de Usuario</h4>
            <?php if(isset($data)):?>
                <div class = "update-diet">
                    <p>Puedes observar tus datos o si lo prefieres puedes actualizarlos</p>
                    <form action="../include/editAuxForm.php" method="POST">
                        <label for="fname">Edad</label>
                        <div>
                            <input type="text" name = "edad">
                            <label for="fname" class="unit">años</label>
                        </div>
                        <label for="fname">Altura</label>
                        <div>
                            <input type="text" name = "altura">
                            <label for="fname" class="unit">cm</label>
                        </div>
                        <label for="fname">Peso Actual</label>
                        <div>
                            <input type="text" name = "peso">
                            <label for="fname" class="unit">Kg</label>
                        </div>
                        <label for="fname">Peso Ideal</label>
                        <div>
                            <input type="text" name = "pesoideal">
                            <label for="fname" class="unit">Kg</label>
                        </div>
                        <button type="submit" name = "enviar">Actualizar</button>
                    </form>
                </div>
            <?php else: ?>
                <div class="msg">
                <p>No tienes acceso</p>
                </div>
            <?php endif ?>   
        </div>
    <?php include('../templates/footer.php'); ?>
    </div>
</div>
<script type="text/javascript">

    const datos = <?php echo json_encode($data); ?>;
    let edadInput = document.querySelector('input[name=edad]')
    let altInput = document.querySelector('input[name=altura]')
    let pesoInput = document.querySelector('input[name=peso]')
    // let pesoActInput = document.querySelector('input[name=pesoActual]')
    let pesoIdInput = document.querySelector('input[name=pesoideal]')
    edadInput.value = datos.edad
    altInput.value = datos.altura
    pesoInput.value = datos.peso
    // pesoActInput.value = datos.peso
    pesoIdInput.value = datos.pesoIdeal

</script>
</html>