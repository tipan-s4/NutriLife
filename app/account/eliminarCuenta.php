<?php 
include('../templates/header.php'); 
?>
<?php require_once '../templates/sidebar.php' ?>
    <div class="settings-aux2">
        <div class = "content slight nochanges">
            <h4 class = "titulo">Borrar Cuenta</h4>
            <?php if(isset($_SESSION['userId'])):?>
                <div class = "delete-account">
                    <h5>ANTES DE CONTINUAR : </h5>
                    <p>Entiendo que esto eliminará de forma permanente mi cuenta en NutriLife, 
                        que no podré recuperar mi información y que esta acción no se puede deshacer.
                        <Br><br>
                        Entiendo que perderé para siempre el acceso a todos los datos asociados con mi perfil, 
                        incluidas las entradas de alimentos, las rutinas, las gráficas, las entradas de peso, etc.
                    </p>
                    <p>¿Estas seguro que deseas borrar tu cuenta?</p>
                    <div class="delete-confirmation">
                        <form action="../include/deleteAccount.php" method="POST">
                            <button type="submit" name="borrar">Borrar</button>
                        </form>
                        <a href=""><p>Cancelar</p></a>
                    </div>
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
</html>