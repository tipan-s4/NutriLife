<?php require_once '../templates/header.php'?>
    <div class="content nochanges">
        <div class="main-forms">
            <div class="card">
                <div>
                    <h2>¡Bienvenido!</h2>
                    <p>Si ya dispones de una cuenta pincha en el boton inferior</p>
                    <a href="inicioSesion.php">Iniciar sesion</a>
                </div>
            </div>
            <div class = "register">
                <h2>Crear una cuenta</h2>
                <form action="../include/registroForm.php" method="POST">
                    <input type="text" name="nombre" placeholder="Nombre...">
                    <p>Solo debe contener letras</p>
                    <input type="text" name="apellidos" placeholder="Apellidos...">
                    <p>Puede contener letras y un espacio</p>
                    <input type="text" name="usuario" placeholder="Nombre de Usuario...">
                    <p>Entre 3 y 12 caracteres</p>
                    <input type="email" name="email" placeholder="Email...">
                    <p>Comprueba que es correcto</p>
                    <input type="password" name="pswd" placeholder="Contraseña...">         
                    <p>Entre 8 y 20 caracteres</p>  
                    <button type="submit" name="enviar" class="enviar">Crear cuenta</button>
                </form>
                <div class="msg">
                    <p>Para crear una cuenta <a href="inicioSesion.php">Pincha aquí</a></p>
                </div>
            </div>
        </div>         
        <?php
            $error = "";
            if(isset($_GET['error'])){
                if($_GET['error']=="emptyinput"){
                    $error = '¡Debes rellenar todos los datos!';
                }
                if($_GET['error']=="usernametaken"){
                    $error = '¡El nombre de usuario o email ya está en uso!';
                }
                if($_GET['error']=="stmtfailed"){
                    $error = '¡Algo fue mal, intentálo de nuevo!';
                }
            }
        ?>
        <div class="msg regex">
            <p><?php echo $error?></p>
        </div>
    </div>    
    <?php require_once '../templates/footer.php'?>
    <script src="../js/regex.js"></script>
</html>