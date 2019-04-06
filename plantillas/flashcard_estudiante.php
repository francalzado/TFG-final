<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/flashcard.css.css" media="screen" />

    <script language="JavaScript">
 
    /* Determinamos el tiempo total en segundos */
    var totalTiempo=60;
    /* Determinamos la url del archivo o del boton de descarga,(en ejemplo descarga de freebsd */
    var url="http://ftp.freebsd.org/pub/FreeBSD/releases/ISO-IMAGES/10.0/CHECKSUM.MD5-10.0-RELEASE-amd64";
 
    function updateReloj()
    {
        document.getElementById('CuentaAtras').innerHTML = "Por favor, espera "+totalTiempo+" segundos";

            /* Restamos un segundo al tiempo restante */
            totalTiempo-=1;
            /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
            setTimeout("updateReloj()",1000);
        
    }
 
    window.onload=updateReloj;
 
    </script>
    
    
    <?php
$PHPvariable;
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$accion1 = (isset($_POST['accion1'])) ? $_POST['accion1'] : "";
$finalizar = (isset($_POST['finalizar'])) ? $_POST['finalizar'] : "";
$id_flash = (isset($_POST['id_fc'])) ? $_POST['id_fc'] : "";

if ($finalizar) {

    try {
        $_SESSION['contador'] = 0;
        Redireccion :: redirigir(RUTA_ESTADISTICAS);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}
$flashcard = $todos[$_SESSION['contador']];

    if ($accion1) {
} else
//FUNCIONA CUANDO YA NO QUEDAN
if (!$flashcard) {
    $_SESSION['contador'] = 0;
    echo "YA ESTA";
}
if ($accion) {
    $PHPvariable = "<script> document.write(totalTiempo) </script>";
echo "PHPvariable = ".$PHPvariable;
    ?>
    
    <?php $respuesta = (isset($_POST['r' . $id_flash])) ? $_POST['r'.$id_flash] : ""; ?><br><?php
    try {
        $sql = "INSERT INTO usuarioflashcard(id_usuario,id_fc,respuesta,fecha) VALUES(:id_usuario,:id_fc,:respuesta,:fecha) ";
        $idusuarioTemp = $_SESSION['id_usuario'];
        $idfcTemp = $id_flash;
        $respuestaTemp = $respuesta;
        $fechatemp = date('Y-m-d H:i:s');

        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':id_usuario', $idusuarioTemp);
        $sentencia->bindParam(':id_fc', $idfcTemp);
        $sentencia->bindParam(':respuesta', $respuestaTemp);
        $sentencia->bindParam(':fecha', $fechatemp, PDO::PARAM_STR);
        $insertado = $sentencia->execute();
    } catch (PDOException $ex) {
        print 'ERROR' . $ex->getMessage();
    }
    ?>
    <div class="container-fluid bg-info">
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
                   
                        <?php echo $flashcard['val']?>
                    <div class="card text-right" style="width: 18rem;">
                        
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
    <?php
    
} else if ($_SESSION['contador'] <= (COUNT($todos))) {
    $name = $flashcard['id_fc'];
    ?>
<h2 id='CuentaAtras'></h2>


    <div class="container-fluid bg-info">
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

                        </div>
                        </div>
                        </div>
                        </div>


                        <div class="container-fluid bg-info" align="center" style="background-color: #bd2130">
                            <span id="answer"></span>
                        </div>

<?php
}
    
    

if ($_SESSION['contador'] === ((COUNT($todos))-1) && $accion) {
    ?>                        
                        <form action="" method="post">

                        <input type="submit" name="finalizar" value="Finalizar">
                    </form>
                    <?php } else if ($_SESSION['contador'] != (COUNT($todos)) && $accion) { ?>
                    <form action="" method="post">
                        <input type="submit" name="accion1" value="Siguiente Flashcard">
                    </form>
                    <?php
                    ControlSesion::setContador();
                    } else {
                            $PHPvariable = "<script> document.write(totalTiempo) </script>";

                    ?>
                    <form action="" method="post">
                        <input type="submit" name="accion" value="Comprobar">
                    </form>
                <?php } ?>
