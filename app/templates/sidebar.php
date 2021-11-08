<div class = "settings-aux queryhide">
    <div class="sidebar">
        <div class="user-settings">
        <?php
             $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
             if ($curPageName == 'perfil.php') {
                echo '<div class="section active">
                        <a href="perfil.php"><img src="../images/usericon.png"><p>Perfil</p></a>
                     </div>
                     <div class="section">
                        <a href="perfilDieta.php"><img src="../images/foodIcon.png"><p>Perfil de dieta</p></a>
                     </div>
                     <div class="section">
                        <a href="eliminarCuenta.php"><img src="../images/trashicon.png"><p>Eliminar Cuenta</p></a>
                     </div>';
             }else if ($curPageName == 'perfilDieta.php') {
                echo '<div class="section">
                        <a href="perfil.php"><img src="../images/usericon.png"><p>Perfil</p></a>
                     </div>
                     <div class="section active">
                        <a href="perfilDieta.php"><img src="../images/foodIcon.png"><p>Perfil de dieta</p></a>
                     </div>
                     <div class="section">
                        <a href="eliminarCuenta.php"><img src="../images/trashicon.png"><p>Eliminar Cuenta</p></a>
                     </div>';
             }else if ($curPageName == 'eliminarCuenta.php') {
                echo '<div class="section">
                        <a href="perfil.php"><img src="../images/usericon.png"><p>Perfil</p></a>
                     </div>
                     <div class="section">
                        <a href="perfilDieta.php"><img src="../images/foodIcon.png"><p>Perfil de dieta</p></a>
                     </div>
                     <div class="section active">
                        <a href="eliminarCuenta.php"><img src="../images/trashicon.png"><p>Eliminar Cuenta</p></a>
                     </div>';
             }
            ?>
        </div>
    </div>