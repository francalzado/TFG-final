<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/flashcard.css.css" media="screen" />
<?php
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$finalizar = (isset($_POST['finalizar'])) ? $_POST['finalizar'] : "";
$id_flash = (isset($_POST['id_fc']))? $_POST['id_fc'] : "";

if ($finalizar) {

    try {
        $_SESSION['contador']=-1;
        Redireccion :: redirigir(RUTA_ESTADISTICAS);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}
?>
<?php

$flashcard = $todos[$_SESSION['contador']];
if($_POST){?>

<?php
$respuesta = $_POST['r'.$id_flash]; ?><br><?php
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
    echo "HAY POST";

}
    ControlSesion::setContador();
//FUNCIONA CUANDO YA NO QUEDAN
if(!$flashcard){
    $_SESSION['contador']=0;
    echo "YA ESTA";
}
   

    if ($_SESSION['contador']<=(COUNT($todos))) {
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
                            
                            if ($_SESSION['contador']===(COUNT($todos))) {
                            ?>                        
                            <input type="submit" name="finalizar" value="Finalizar">
                        </form>
                    <?php } else {
                        ?>
                        <form action="" method="post">
                            <input type="submit" name="accion" value="Siguiente">
                        </form>
                    <?php } ?>
