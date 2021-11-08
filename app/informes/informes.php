<?php require_once '../templates/header.php' ?>
<?php
    require_once '../class/dbc.php';
    require_once '../class/user.php';
    require_once '../class/food.php';
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

    $aux = new User();
    $user = $aux->getAuxForm($_SESSION['userId']);
    require_once '../include/foodExercise.php';
?>

<div class="content">
<div class="registro-diario">
            <h4>Tus informes para: <h4>
            <form id="envia" method="post">
                <input type="date" name="fecha" id="fecha">
            </form>
        </div>
    <div class="flex">
        <div class="canva">
            <canvas id="myCanvas"  width="100"></canvas>
            <legend class="lege" for="myCanvas"></legend>
        </div>
        <div class="datos-informe">
            <div class="progressDiv">
                <div class="progress-pie-chart" data-percent="100"><!--Pie Chart -->
                    <div class="ppc-progress">
                        <div class="ppc-progress-fill"></div>
                    </div>
                    <div class="ppc-percents">
                        <div class="pcc-percents-wrapper">
                            <span><p><?php echo $restantes?></p><p>Kcal</p></span>
                        </div>
                    </div>
                </div><!--End Chart -->
                <p>Objetivo</p>
            </div>
            <div class = "calculos-informes">
                <div class="progressDiv">
                    <div class="progress-pie-chart" data-percent="<?php echo $porcentajeAlimentos?>"><!--Pie Chart -->
                        <div class="ppc-progress">
                            <div class="ppc-progress-fill"></div>
                        </div>
                        <div class="ppc-percents">
                            <div class="pcc-percents-wrapper">
                                <span><p><?php echo $sumaAlimentos?></p><p>Kcal</p></span>
                            </div>
                        </div>
                    </div><!--End Chart -->
                    <p>Alimentos</p>
                </div>
                <div class="progressDiv">
                    <div class="progress-pie-chart" data-percent="<?php echo $porcentajeEjercicios?>"><!--Pie Chart -->
                        <div class="ppc-progress">
                            <div class="ppc-progress-fill"></div>
                        </div>
                        <div class="ppc-percents">
                            <div class="pcc-percents-wrapper">
                                <span><p><?php echo $sumaEjercicios?></p><p>Kcal</p></span>
                            </div>
                        </div>
                    </div><!--End Chart -->
                    <p>Ejercicios</p>
                </div>
            </div>
            <div class="progressDiv activo">
                <div class="progress-pie-chart" data-percent="<?php echo $auxneto?>">
                    <div class="ppc-progress">
                        <div class="ppc-progress-fill"></div>
                    </div>
                    <div class="ppc-percents">
                        <div class="pcc-percents-wrapper">
                            <span><p><?php echo $auxneto?>%</p></span>
                        </div>
                    </div>
                </div>
                <p>Completado</p>
            </div>
        </div>
    </div>
</div>

<?php require_once '../templates/footer.php' ?>

<script type="text/javascript" src="../js/informes.js"></script>
<script src="../js/calendario.js"></script>
<script>
$(function(){
    $('.progressDiv ').each(function (i) {
        var $ppc = $(this).find('.progress-pie-chart'),
            percent = parseInt($ppc.data('percent')),
            deg = 360*percent/100;
        if (percent > 50) {
            if (percent > 100) {
                if (percent > 200) {
                    $ppc.addClass('gt-200');
                    $(this).find('.pcc-percents-wrapper p').css({color:'#e5383b'});
                }else{
                    $ppc.addClass('gt-100');
                    $(this).find('.pcc-percents-wrapper p').css({color:'#fcb75d'});
                }
                deg =360
            }
            else{
                $ppc.addClass('gt-50');
            }
        }else{
            $ppc.addClass('gt-0');
        }
        if(deg == 0){
            $(this).find('.ppc-progress-fill').css({ transition: "transform 1s",transform:  "rotate(" + 1 + "deg)" });
        }else{
            $(this).find('.ppc-progress-fill').css({ transition: "transform 1s",transform:  "rotate(" + deg + "deg)" });
        }
    });
});
   </script>
</html>