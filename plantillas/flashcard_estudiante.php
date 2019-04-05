<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/flashcard.css.css" media="screen" />
<?php
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$finalizar = (isset($_POST['finalizar'])) ? $_POST['finalizar'] : "";
if ($accion) {

    try {
//REDIRECCIONAMIENTO A LOS TEMAS DE LA ASIGNATURA SELECCIONADA
        Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' .  $_GET['id_tema']);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}
?>
<?php
if($_POST){
    
    //evento insertar respuesta
    //return array mensajes(),"")
    //return true
    
    
    //evento respuesta correcta(respuesta)
    //return false
    //return respuesta correcta
    
    
    //evento es ultima respuesta
    //return true
    //false
    
    
    //Framework (laravel, simfony...)
    //Sass o less
    //Jquery
    //ajax y json
    
    //if  insertar respuesta
    //
    //
    ControlSesion::setContador();

}
$flashcard = $todos[$_SESSION['contador']];
//FUNCIONA CUANDO YA NO QUEDAN
//if(!$flashcard){
//    echo "YA ESTA";
//}
   

    if ($_SESSION['contador']<(COUNT($todos))) {
        $name = $flashcard['id_fc'];
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
                        <form action="" method="post">
                            <input type="radio" name="r<?php echo $name ?>" value="1"><?php echo $flashcard['r1']; ?><br>
                            <input type="radio" name="r<?php echo $name ?>" value="2"><?php echo $flashcard['r2']; ?><br>
                            <input type="radio" name="r<?php echo $name ?>" value="3"><?php echo $flashcard['r3']; ?><br>
                            <input type="radio" name="r<?php echo $name ?>" value="4"><?php echo $flashcard['r4']; ?><br>

                            </div>
                            </div>
                            </div>
                            </div>


                            <div class="container-fluid bg-info" align="center" style="background-color: #bd2130">
                                <span id="answer"></span>
                            </div>

                            <?php
                            } else {

                            include_once 'plantillas/documento-declaracion.inc.php';
                            include_once 'plantillas/navbar-inicio.inc.php';
                            ?>

                            <div class="container-fluid bg-info">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3><span class="label label-warning"  id="qid"><?php echo 'Tema ' . $_GET['id_tema'] ?></span> <?php echo $flashcard['pregunta']; ?></h3>
                                        </div>
                                        <div class="modal-header">
                                            <div class="text-center">

                                                <h4><?php echo $flashcard['cuerpo']; ?></h4>          </div>
                                        </div>
                                        <div class="modal-body">

                                            <h4><?php echo $rc; ?></h4> 
                                            <h4><?php echo 'r' . $respuesta; ?></h4> 
                                            <?php
                                            if ($rc === 'r' . $respuesta) {
                                                echo "Bien";
                                            } else if ($respuesta == "") {
                                                echo" No contestada";
                                            } else {
                                                echo" Mal";
                                            }

                                            try {
                                                $sql = "INSERT INTO usuarioflashcard(id_usuario,id_fc,respuesta,fecha) VALUES(:id_usuario,:id_fc,:respuesta,:fecha) ";
                                                $idusuarioTemp = $_SESSION['id_usuario'];
                                                $idfcTemp = $flashcard['id_fc'];
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

                                        </div>
                                    </div>
                                </div>
                            </div>

                                    <?php
                                }
                            
                            if (!$finalizar) {
                            ?>                        
                            <input type="submit" name="finalizar" value="Finalizar">
                        </form>
                    <?php } else {
                        ?>
                        <form action="" method="post">
                            <input type="submit" name="accion" value="Acceder">
                        </form>
                    <?php } ?>
