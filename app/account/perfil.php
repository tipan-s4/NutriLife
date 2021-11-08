<?php 
include('../templates/header.php'); 
require_once '../class/dbc.php';
require_once '../class/user.php';

    //detalles de cada usuario
    if(isset($_SESSION['userId'])){

        $id = $_SESSION['userId'];
        $aux = new User();
        $user = $aux->getUserById($id);
    }
?>
<?php require_once '../templates/sidebar.php' ?>
    <div class="settings-aux2">
        <div class="content slight nochanges">
        <?php if(isset($user)):?>
            <h4 class = "titulo">Ajustes de Usuario</h4>
            <div class="table">
                <table>
                    <tr>
                        <th><h2>Información personal</h2></th>
                    </tr>
                    <tr class="nombretr">
                        <td><h4>NOMBRE</h4></td>
                        <td><p><?php echo $user['nombre'];?></p></td>
                        <td><p class="edit nombre">Editar</p></td>
                    </tr>
                    <tr class="apellidotr">
                        <td><h4>NOMBRE</h4></td>
                        <td><p><?php echo $user['apellidos'];?></p></td>
                        <td><p class="edit apellido">Editar</p></td>
                    </tr>
                    <tr class="usernametr">
                        <td><h4>NOMBRE DE USUARIO</h4></td>
                        <td><p><?php echo $user['nombreUser']; ?></p></td>
                        <td><p class="edit username">Editar</p></td>
                    </tr>
                    <tr>
                        <td><h4>CORREO ELECTRÓNICO<h4></td>
                        <td><p><?php echo $user['email']; ?></p></td>
                    </tr>        
                </table>
            </div>
            <div class="save">
            </div>
            <?php else: ?>
                <div class="msg">
                <p>No tienes acceso</p>
                </div>
            <?php endif ?>  

            <?php 
                if(isset($_GET['err'])){
                    if($_GET['err'] == "empty") {
                        echo '<div class="msg">
                            <p>Debes rellenar los campos</p>
                            </div>';
                    }else if($_GET['err'] == "usernametaken"){
                        echo '<div class="msg">
                            <p>El nombre de usuario ya esta en uso</p>
                            </div>';
                    }
                    else if($_GET['err'] == "error"){
                        echo '<div class="msg">
                            <p>Se ha producido un error inesperado</p>
                            </div>';
                    }
                }
                ?>
        </div>
    <?php include('../templates/footer.php'); ?>
    </div>
</div>
    <script src = "../js/editarUsuario.js"></script>
</html>

