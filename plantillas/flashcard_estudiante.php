<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/flashcard.css.css" media="screen" />
<?php
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$finalizar = (isset($_POST['finalizar'])) ? $_POST['finalizar'] : "";
if ($finalizar) {

    try {
//REDIRECCIONAMIENTO A LOS TEMAS DE LA ASIGNATURA SELECCIONADA
        $_SESSION['contador']=0;
        Redireccion :: redirigir(RUTA_ESTADISTICAS);
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
    echo "HAY POST";

}
$flashcard = $todos[$_SESSION['contador']];

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
