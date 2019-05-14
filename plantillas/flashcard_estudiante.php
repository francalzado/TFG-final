<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/flashcard.css.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script language="JavaScript">

    /* Determinamos el tiempo total en segundos */
    var totalTiempo = 60;
    /* Determinamos la url del archivo o del boton de descarga,(en ejemplo descarga de freebsd */
    var url = "http://ftp.freebsd.org/pub/FreeBSD/releases/ISO-IMAGES/10.0/CHECKSUM.MD5-10.0-RELEASE-amd64";

    function updateReloj()
    {
        document.getElementById('CuentaAtras').innerHTML = "Tiempo BONUS: " + totalTiempo + "";
        var data = {};

        /* Restamos un segundo al tiempo restante */
        if (totalTiempo != 0)
            totalTiempo -= 1;
        data.totalTiempo = totalTiempo;
        /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
        setTimeout("updateReloj()", 1000);

    }

    window.onload = updateReloj;
    function Reloj() {

        document.getElementById("demo2").value = totalTiempo;
        // window.location.href = window.location.href + "?w1=" + totalTiempo;
    }
</script>
<?php
$PHPvariable;
$prueba;
$varHtml;
$valor = (isset($_POST['demo2'])) ? $_POST['demo2'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$tiempo = (isset($_POST['tiempo'])) ? $_POST['tiempo'] : "0";
$totalTiempo = (isset($_POST['totalTiempo'])) ? $_POST['totalTiempo'] : "";
$accion1 = (isset($_POST['accion1'])) ? $_POST['accion1'] : "";
$finalizar = (isset($_POST['finalizar'])) ? $_POST['finalizar'] : "";
$id_flash = (isset($_POST['id_fc'])) ? $_POST['id_fc'] : "";
$punto = 100 / (COUNT($todos));
$flashcard = $todos[$_SESSION['contador']];
$respuesta = (isset($_POST['r' . $id_flash])) ? $_POST['r' . $id_flash] : "";
?><br><?php
if ($accion && ($respuesta === $flashcard['val'])) {
    $_SESSION['puntuacion'] += $punto;
}
if ($finalizar) {

    try {
        $_SESSION['puntuacion'] = 0;
        $_SESSION['contador'] = 0;
        $_SESSION['score'] = 0;
        Redireccion :: redirigir(RUTA_ESTADISTICAS);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}


if ($accion1) {
    
} else
//FUNCIONA CUANDO YA NO QUEDAN
if (!$flashcard) {
    $_SESSION['contador'] = 0;
    $_SESSION['puntuacion'] = 0;
    $_SESSION['score'] = 0;
}
if ($respuesta === $flashcard['val']) {
    $_SESSION['score'] += $valor;
}else{
   $valor=0;
}
?>
<div class="progress">
    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $_SESSION['puntuacion'] ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<h3 style="color:brown ;" style="margin-left: 70px"><?php echo "SCORE = " . $_SESSION['score']; ?></h3>

<?php
if ($accion) {
    ?>

    <?php $respuesta = (isset($_POST['r' . $id_flash])) ? $_POST['r' . $id_flash] : ""; ?><br><?php
    try {
        $sql = "INSERT INTO usuarioflashcard(id_usuario,id_fc,respuesta,fecha,score) VALUES(:id_usuario,:id_fc,:respuesta,:fecha,:score) ";
        $idusuarioTemp = $_SESSION['id_usuario'];
        $idfcTemp = $id_flash;
        $respuestaTemp = $respuesta;
        $fechatemp = date('Y-m-d H:i:s');
        $scoreTemp = $valor;
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':id_usuario', $idusuarioTemp);
        $sentencia->bindParam(':id_fc', $idfcTemp);
        $sentencia->bindParam(':respuesta', $respuestaTemp);
        $sentencia->bindParam(':score', $scoreTemp);
        $sentencia->bindParam(':fecha', $fechatemp, PDO::PARAM_STR);
        $insertado = $sentencia->execute();
    } catch (PDOException $ex) {
        print 'ERROR' . $ex->getMessage();
    }
    ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><span class="label label-warning"  id="qid"><?php echo 'Tema ' . $_GET['id_tema'] ?></span> <?php echo $flashcard['pregunta']; ?></h3>
                </div>
                <div class="modal-header">
                    <div class="text-center">
                        <h4><?php echo $flashcard['cuerpo']; ?></h4>          
                    </div>
                </div>
                <div class="modal-body">

                    <?php
                    if ($respuesta === $flashcard['val']) {
                        $_SESSION['score'] += $valor;
                        ?><h3 style="color:mediumseagreen;">Correcto. </h3>
                        <?php
                    } else {
                        ?> <h3 style="color:Tomato;">Incorrecto.</h3><h3 style="color:black">La respuesta correcta era
                            <?php echo $flashcard['r' . $flashcard['val']]; ?> </h3> 
                    <?php }
                    ?>


                </div>
                <?php
            } else if ($_SESSION['contador'] <= (COUNT($todos))) {

                $name = $flashcard['id_fc'];
                ?>
                <h2 id='CuentaAtras' style="margin-right: 70px"></h2>



                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><span class="label label-warning"  id="qid"><?php echo 'Tema ' . $_GET['id_tema'] ?></span> <?php echo $flashcard['pregunta']; ?></h3>
                        </div>
                        <div class="modal-header">
                            <div class="text-center">
                                <h4><?php echo $flashcard['cuerpo']; ?></h4>          
                            </div>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <input type="radio" name="r<?php echo $name ?>" value="1"><?php echo $flashcard['r1']; ?><br>
                                <input type="radio" name="r<?php echo $name ?>" value="2"><?php echo $flashcard['r2']; ?><br>
                                <input type="radio" name="r<?php echo $name ?>" value="3"><?php echo $flashcard['r3']; ?><br>
                                <input type="radio" name="r<?php echo $name ?>" value="4"><?php echo $flashcard['r4']; ?><br>
                                <input type="hidden" name="id_fc" value="<?php echo $flashcard['id_fc']; ?>">
                                <div class="container-fluid bg-info" align="center">
                                    <span id="answer"></span>
                                </div>

                                <?php
                            }



                            if ($_SESSION['contador'] === ((COUNT($todos)) - 1) && $accion) {
                                ?>                        
                                <form action="" method="post">

                                    <input type="submit" name="finalizar" value="Finalizar" style="float:right">
                                </form>

                        </div>
                    </div>
                </div>
                <?php
            } else if ($_SESSION['contador'] != (COUNT($todos)) && $accion) {
                if ($respuesta === $flashcard['val'])
                    $_SESSION['score'] -= $valor;
                ?>

                <form action="" method="post">
                    <input type="submit" name="accion1" value="Siguiente Flashcard" style="float:right" onclick="updateReloj();">
                </form>

            </div>
        </div>
    </div>
    <?php
    ControlSesion::setContador();
} else {
    ?>
    <form action="" method=" ">
        <input type="submit" name="accion" value="Comprobar" style="float:right" onclick="Reloj();">
        <input type="hidden" name="demo2" id="demo2" value="">
    </form>
    </div>
    </div>
    </div>

<?php } ?>