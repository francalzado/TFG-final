<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <?php if ($_GET['puntosFinales'] <= 50) { ?>
                <i class="far fa-frown fa-3x fa-award"></i>
                <h3 style="color:Tomato;">Tema no superado.</h3>
            <?php } else { ?>
                <i class="fas fa-award fa-3x"></i>
                <h3 style="color:seagreen;">¡Tema superado con exito!</h3>
            <?php } ?>
        </div>
        <div class="card-body">                   
            <?php if ($_GET['puntosFinales'] <= 50) { ?>
                <h3 style="color:Tomato;">Tu porcentaje de preguntas acertadas ha sido del <b><?php echo $_GET['puntosFinales'] ?> %</b>.</h3>
                <br>
                <h3 style="color:black;">Tu score total ha sido  <b><?php echo $_SESSION['score'] ?> puntos</b>.</h3>
            <?php } else { ?>
                <h3 style="color:seagreen;">Tu porcentaje de preguntas acertadas ha sido del <b><?php echo $_GET['puntosFinales'] ?> %</b>.</h3>
                <br>
                <h3 style="color:black;">Tu score total ha sido <b><?php echo $_SESSION['score'] ?> puntos</b>.</h3>
            <?php } ?>
        </div> 
        <div class="card-footer">                   
            <p><a href="<?php echo RUTA_MIS_ASIGNATURAS . '?id_usuario=' . $_SESSION['id_usuario']; ?>">Ir al menú principal</a></p>

        </div>
    </div>
</div>
<?php
$_SESSION['puntuacion'] = 0;
$_SESSION['contador'] = 0;
$_SESSION['score'] = 0;
?>