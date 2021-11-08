<?php
session_start();
require_once "class/dbc.php";
require_once "class/user.php";
require_once "class/food.php";
require_once "class/exercise.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriLife</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/nav.js"></script>
</head>

<body class="lightmode">
    <div class="container lightmode">
        <?php if (isset($_SESSION['userId'])) : ?>
            <header>
                <a href="index.php" class="logo"><img src="images/logo_small.png"></a>
                <div class="msg">
                    <p>¡Bienvenido <?php echo $_SESSION['userUid'] ?>!</p>
                </div>
                <nav>
                    <div class="lines">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                    </div>
                    <ul class="nav-links">
                        <li><a href="food/alimentos.php">
                                <p>Alimentos</p>
                                <div></div>
                            </a></li>
                        <li><a href="exercise/ejercicio.php">
                                <p>Ejercicio</p>
                                <div></div>
                            </a></li>
                        <li><a href="informes/informes.php">
                                <p>Informes</p>
                                <div></div>
                            </a></li>
                        <li><a href="account/perfil.php">
                                <p>Ajustes</p>
                                <div></div>
                            </a></li>
                        <li><a href="include/logout.php">
                                <p>Cerrar Sesion</p>
                                <div></div>
                            </a></li>
                        <li><a class="night"><img src="images/luna2.png"></a></li>
                    </ul>
                </nav>
            </header>
            <?php
            $aux = new User();
            $user = $aux->getUserById($_SESSION['userId']);
            if ($user['auxForm'] == 'N') {
                echo '<div class="fullscreen-container">
                                <div class="other-form">
                                <h2>Solo falta un poco</h2>
                                <form action="include/auxForm.php" method="POST">
                                <input type="number" name="edad" placeholder="Introduce tu edad"> 
                                <input type="number" name="altura" placeholder="Altura actual(cm)">  
                                <input type="number" name="peso" placeholder="Peso actual(Kg)">  
                                <input type="number" name="pesoideal" placeholder="Peso a lograr(Kg)">
                                <div>
                                    <label>
                                        <input type="radio" name="gender" value="H"> Hombre
                                    </label>    
                                    <label>
                                        <input type="radio" name="gender" value="M"> Mujer
                                    </label> 
                                </div> 
                                    <button type="submit" name="enviar">Enviar</button>
                            </form>
                        </div></div>';
            }
            require_once "include/auxIndex.php";
            ?>
            <div class="content">
                <h3 class="index-titulo">Tu resumen diario</h3>
                <div class="index-resumen">
                    <div class="info-index">
                        <div class="card">
                            <img src="images/foodIcon.png">
                            <p class="tit">Alimentos</p>
                            <?php if (isset($foodCount)) : ?>
                                <p class="count"><?php echo $foodCount ?></p>
                            <?php else : ?>
                                <p class="count">0</p>
                            <?php endif ?>
                        </div>
                        <div class="card">
                            <img src="images/iconopesa.png">
                            <p class="tit">Ejercicios</p>
                            <?php if (isset($actividad)) : ?>
                                <p class="count"><?php echo count($actividad) ?></p>
                            <?php else : ?>
                                <p class="count">0</p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="resumen-data">
                        <div class="cal-res">
                            <p>Calorias restantes</p>
                            <?php if(isset($userGender) && $userGender == 'H'): ?>
                                <h1>2000</h1>
                            <?php else: ?>
                                <h1>1800</h1>
                            <?php endif ?>
                        </div>
                        <div class="cal-enl">
                            <a href="food/alimentos.php">Añadir alimentos</a>
                            <a href="exercise/ejercicio.php">Añadir ejercicios</a>
                        </div>
                        <div class="cal-math">
                            <div class="cal-obj">
                                <?php if(isset($userGender) && $userGender == 'H'): ?>
                                    <h4>2000</h4>
                                <?php else: ?>
                                    <h4>1800</h4>
                                <?php endif ?>
                                <p>OBJETIVO</p>
                            </div>
                            <div class="cal-al">
                                <h4><?php echo $sumaAlimentos ?></h4>
                                <p>ALIMENTO</p>
                            </div>
                            <div>
                                <h4>-</h4>
                            </div>
                            <div class="cal-ej">
                                <h4><?php echo $sumaEjercicios ?></h4>
                                <p>EJERCICIO</p>
                            </div>
                            <div>
                                <h4>=</h4>
                            </div>
                            <div class="cal-neto">
                                <h4><?php echo $neto ?></h4>
                                <p>NETO</p>
                            </div>
                        </div>
                        <div class="width-pro">
                            <div class='progress'>
                                <div class='progress-bar' data-width='58'>
                                    <div class='progress-bar-text'>
                                        <span class='data-percent'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <div class="contacto">
                    <div class="redes">
                        <h3>Síguenos en</h3>
                        <a href="https://twitter.com/"><img src="images/tw.png">Twitter</a>
                        <a href="https://www.instagram.com/"><img src="images/insta.png">Instagram</a>
                        <a href="https://www.facebook.com/"><img src="images/facebook.png">Facebook</a>
                    </div>
                    <div class="preguntas">
                        <h3>NutriLife</h3>
                        <a href="legal/quienesSomos.php">¿Quiénes somos?</a>
                        <a href="mailto:NutriLife@gmail.com">Contáctanos</a>
                        <a href="legal/preguntasFrecuentes.php">Preguntas Frecuentes</a>
                    </div>
                    <div class="legal">
                        <h3>Legal</h3>
                        <a href="legal/AvisoLegal.php">Condiciones de uso</a>
                        <a href="legal/politicaPrivacidad.php">Politica de Privacidad</a>
                        <a href="legal/cookies.php">Cookies</a>
                    </div>
                </div>
                <p>Copyright &copy; NutriLife | Todos los derechos reservados</p>
            </footer>
        <?php else : ?>
            <div class="back-image">
                <header>
                    <a href="index.php" class="logo"><img src="images/logo_small.png"></a>
                    <nav>
                        <div class="lines">
                            <div class="line1"></div>
                            <div class="line2"></div>
                            <div class="line3"></div>
                        </div>
                        <ul class="nav-links">
                            <li><a href="account/inicioSesion.php">
                                    <p>Inicio de sesion</p>
                                    <div></div>
                                </a></li>
                            <li><a href="account/registro.php">
                                    <p>Registrarse</p>
                                    <div></div>
                                </a></li>
                            <li><a class="night"><img src="images/luna2.png"></a></li>
                        </ul>
                    </nav>
                </header>
                <div class="small-back-image">
                    <div class="mensaje">
                        <div>
                            <h1 id="primero">Bienvenido</h2>
                                <h1 id="segundo">a</h2>
                                    <h1 id="tercero">NutriLife</h2>
                        </div>
                        <p>En esta aplicación te ayudaremos a controlar tu ingesta calórica
                            y tu actividad física durante el tiempo que estes con nosotros.
                            En ella verás los nutrientes, calorias y otros aspectos que influiran
                            en tí para mejorar tu salud y te aydara a perder, ganar o mantener tu
                            forma fisica.
                        </p>
                        <a href="account/registro.php">Comencemos</a>
                    </div>
                    <div class="info-index">
                        <img src ="images/bol.png">
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="show-more">
                    <img src="images/grunge-arrow.png">
                </div>
                <div class="show-content">
                    <div class="div2">
                        <div>
                            <h2>¿Por qué NutriLife?</h2>
                            <ul>
                                <li>100% Gratis</li>
                                <li>Rapida, intuitiva y facil de usar</li>
                                <li>Formar parte de una gran comunidad</li>
                            </ul>
                        </div>
                        <div>
                            <h2>¿Como funciona NutriLife?</h2>
                            <span>La gente que registra la comida logra mayor perdida de peso y mayor rapidez para lograr sus objetivos.</span>
                        </div>
                    </div>
                    <div class="div3">
                        <h2>¿Que herramientas podemos encontrar en NutriLife?</h2>
                        <div class="list-container">
                            <div class="list-left">
                                <div class="lista-index">
                                    <img src="images/tick.png">
                                    <p>Información nutricional de toda la comida</p>
                                </div>
                                <div class="lista-index">
                                    <img src="images/tick.png">
                                    <p>Una opcion de cambiar el peso para adaptarlo al momento y adaptar las cantidades nutricionales</p>
                                </div>
                                <div class="lista-index">
                                    <img src="images/tick.png">
                                    <p>Registro de alimentos y ejercicios</p>
                                </div>
                            </div>
                            <div class="list-right">
                                <div class="lista-index">
                                    <img src="images/tick.png">
                                    <p>Un diario para hacer un seguimiento</p>
                                </div>
                                <div class="lista-index">
                                    <img src="images/tick.png">
                                    <p>Proceso de registro simplificado e intuitivo</p>
                                </div>
                                <div class="lista-index">
                                    <img src="images/tick.png">
                                    <p>Gráficas personalizadas diarias</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="index-herramientas">
                        <div class="funcion">
                            <h3>Registro de tus alimentos</h3>
                            <p>
                                Añade los alimentos que ingieras para consultar la informacion nutricional y llevar un control de 
                                lo que comes cada día. Aprende qué alimentos son más o menos
                                calóricos en función de tu objetivo y usa esta información para hacer tu compra más saludable.
                            </p>
                            <img class="imagen" src="images/food3.jpg">
                        </div>
                        <div class="funcion reverse">
                            <h3>Registro de tus ejercicios</h3>
                            <p>
                                También contamos con un regitro de actividades con el que puedes 
                                hacer un seguimiento de las calorias que consumas cada vez que realizas ejercicio.
                            </p>
                            <img class="imagen" src="images/ejercicio.jpg">
                        </div>
                        <div class="funcion">
                            <h3>Consulta tus gráficas</h3>
                            <p>
                                En NutriLife sabemos que cuanto más claro y sencillo mejor. Es por eso 
                                que contamos con gráficas personalizadas con todos los datos que 
                                necesitas saber de una forma mas visual y sencilla.
                            </p>
                            <img class="imagen" src="images/bar.png">
                        </div>
                    </div>
                    <a href="account/registro.php" class="redirigir-index">Comenzar a usar NutriLife</a>
                </div>
            </div>
            <footer>
                <div class="contacto">
                    <div class="redes">
                        <h3>Síguenos en</h3>
                        <a href="https://twitter.com/"><img src="images/tw.png">Twitter</a>
                        <a href="https://www.instagram.com/"><img src="images/insta.png">Instagram</a>
                        <a href="https://www.facebook.com/"><img src="images/facebook.png">Facebook</a>
                    </div>
                    <div class="preguntas">
                        <h3>NutriLife</h3>
                        <a href="legal/quienesSomos.php">¿Quiénes somos?</a>
                        <a href="mailto:NutriLife@gmail.com">Contáctanos</a>
                        <a href="legal/preguntasFrecuentes.php">Preguntas Frecuentes</a>
                    </div>
                    <div class="legal">
                        <h3>Legal</h3>
                        <a href="legal/AvisoLegal.php">Condiciones de uso</a>
                        <a href="legal/politicaPrivacidad.php">Politica de Privacidad</a>
                        <a href="legal/cookies.php">Cookies</a>
                    </div>
                </div>
                <p>Copyright &copy; NutriLife | Todos los derechos reservados</p>
            </footer>
        <?php endif ?>
    </div>
</body>
<script src="js/nightmode.js"></script>
<script src="js/barraIndex.js"></script>
</html>