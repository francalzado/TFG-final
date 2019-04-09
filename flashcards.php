<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$todos = RepositorioFlashcard :: obtener_todos(Conexion :: obtener_conexion(), $_GET['id_tema']);
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$titulo = 'Inicio';
$txtId_fc = (isset($_POST['txtId_fc'])) ? $_POST['txtId_fc'] : "";
$txtId_tema = (isset($_POST['txtId_tema'])) ? $_POST['txtId_tema'] : "";
$txtPregunta = (isset($_POST['txtPregunta'])) ? $_POST['txtPregunta'] : "";
$txtEmail = (isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : "";
$txtR1 = (isset($_POST['txtR1'])) ? $_POST['txtR1'] : "";
$txtR2 = (isset($_POST['txtR2'])) ? $_POST['txtR2'] : "";
$txtR3 = (isset($_POST['txtR3'])) ? $_POST['txtR3'] : "";
$txtR4 = (isset($_POST['txtR4'])) ? $_POST['txtR4'] : "";
$txtCuerpo = (isset($_POST['txtCuerpo'])) ? $_POST['txtCuerpo'] : "";
$txtVal = (isset($_POST['txtVal'])) ? $_POST['txtVal'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$accion1 = (isset($_POST['accion1'])) ? $_POST['accion1'] : "";
$siguiente = null;
include_once 'plantillas/documento-declaracion.inc.php';

if (ControlSesion::sesion_iniciada() && ((ControlSesion::getRol() == '2') || (ControlSesion::getRol() == '3'))) {
    include_once 'plantillas/navbar-inicio.inc.php';

    switch ($accion1) {
        case "btnModificar":
            $usuario_modificado = false;
            try {
                $sql = "UPDATE flashcard SET
                pregunta = :Pregunta,
                r1 = :R1,
                r2 = :R2,
                r3 = :R3,
                r4 = :R4,
                cuerpo = :Cuerpo,
                val = :Val 
                WHERE id_fc = :Id_fc";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':Id_fc', $txtId_fc);
                $sentencia->bindParam(':Pregunta', $txtPregunta);
                $sentencia->bindParam(':R1', $txtR1);
                $sentencia->bindParam(':R2', $txtR2);
                $sentencia->bindParam(':R3', $txtR3);
                $sentencia->bindParam(':R4', $txtR4);
                $sentencia->bindParam(':Cuerpo', $txtCuerpo);
                $sentencia->bindParam(':Val', $txtVal);
                $usuario_modificado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
            if ($usuario_modificado) {
                print 'Se ha modificado correctamente';
                Redireccion :: redirigir(RUTA_FLASHCARDS. '?id_tema=' .  $_GET['id_tema']);
            }
            if (!$usuario_modificado)
                print 'No se ha modificado correctaente';
            Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' .  $_GET['id_tema']);

            break;
        case "btnEliminar":
            $usuario_borrado = false;
            try {
                $sql = "DELETE from flashcard
                WHERE id_fc = :Id_fc";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':Id_fc', $txtId_fc);
                $usuario_borrado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
            if ($usuario_borrado) {
                Redireccion :: redirigir(RUTA_FLASHCARDS. '?id_tema=' .  $_GET['id_tema']);
                print 'Se ha borrado correctamente';
            }
            if (!$usuario_borrado)
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' .  $_GET['id_tema']);
            print 'No se ha borrado correctaente';


            break;
        case "btnAdd":
            $usuario_Add = false;
            try {
                $sql = "INSERT INTO flashcard(id_tema,pregunta,r1,r2,r3,r4,cuerpo,val) VALUES(:id_tema, :pregunta, :r1, :r2,:r3,:r4,:cuerpo,:val) ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $_GET['id_tema']);
                $sentencia->bindParam(':pregunta', $txtPregunta);
                $sentencia->bindParam(':r1', $txtR1);
                $sentencia->bindParam(':r2', $txtR2);
                $sentencia->bindParam(':r3', $txtR3);
                $sentencia->bindParam(':r4', $txtR4);
                $sentencia->bindParam(':cuerpo', $txtCuerpo);
                $sentencia->bindParam(':val', $txtVal);
                $flascard_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
            if ($usuario_Add) {
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' .  $_GET['id_tema']);
                print 'Se ha añadido correctamente';
            }
            if (!$usuario_Add)
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' .  $_GET['id_tema']);
            print 'No se ha añadido correctaente';


            break;
    }
    ?>

    <div class="row col-lg-12">
        <div class='col-lg-8'>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pregunta</th>
                        <th>R1</th>
                        <th>R2</th>
                        <th>R3</th>
                        <th>R4</th>
                        <th>Cuerpo</th>
                        <th>Correcta</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <?php foreach ($todos as $flashcard) { ?>
                    <tr>           
                        <td><?php echo $flashcard['pregunta']; ?></td>
                        <td><?php echo $flashcard['r1']; ?></td>
                        <td><?php echo $flashcard['r2']; ?></td>
                        <td><?php echo $flashcard['r3']; ?></td>
                        <td><?php echo $flashcard['r4']; ?></td>
                        <td><?php echo $flashcard['cuerpo']; ?></td>
                        <td><?php echo $flashcard['val']; ?></td>
                        <td>
                            <form action="" method="post">

                                <input type="hidden" name="txtId_fc" value="<?php echo $flashcard['id_fc']; ?>">
                                <input type="hidden" name="txtId_tema" value="<?php echo $flashcard['id_tema']; ?>">
                                <input type="hidden" name="txtPregunta" value="<?php echo $flashcard['pregunta']; ?> ">
                                <input type="hidden" name="txtR1" value="<?php echo $flashcard['r1']; ?>">
                                <input type="hidden" name="txtR2" value="<?php echo $flashcard['r2']; ?>">
                                <input type="hidden" name="txtR3" value="<?php echo $flashcard['r3']; ?>">
                                <input type="hidden" name="txtR4" value="<?php echo $flashcard['r4']; ?>">
                                <input type="hidden" name="txtCuerpo" value="<?php echo $flashcard['cuerpo']; ?>">
                                <input type="hidden" name="txtVal" value="<?php echo $flashcard['val']; ?>">
                                <input type="submit" name="accion" value="Seleccionar">

                            </form>
                        </td>
                    </tr>

                <?php } ?>


            </table>



        </div>
        <div class="col-lg-4">
            <div class="col-md-9 mx-auto">
                <div class="card mt-4 text-center">
                    <div class="card-header">
                        <h1 class="h5">
                            <p>Datos de Flashcard seleccionada </p>
                        </h1>
                    </div>
                    <div class="card-body">                    

                        <form action="" method="post">

                            <input type="hidden" name="txtId_fc" value="<?php echo $flashcard['id_fc']; ?>">
                                <input type="hidden" name="txtId_tema" value="<?php echo $flashcard['id_tema']; ?>">
                                
                            <label class="col-md-4 control-label" for="textinput">Pregunta</label>  
                            <input type="text" name="txtPregunta"  value="<?php echo $txtPregunta; ?>" placeholder="Pregunta" id="txtPregunta" require="">
                            <br>
                            <br>
                            <label class="col-md-4 control-label" for="textinput">R1</label>  
                            <input type="text" name="txtR1"  value="<?php echo $txtR1; ?>" placeholder="R1" id="txtR1" require="">
                            <br>
                            <br>
                            <label class="col-md-4 control-label" for="textinput">R2</label>  
                            <input type="text" name="txtR2"  value="<?php echo $txtR2; ?>" placeholder="R2" id="txtR2" require="">
                            <br>
                            <br>
                            <label class="col-md-4 control-label" for="textinput">R3</label>  
                            <input type="text" name="txtR3"  value="<?php echo $txtR3; ?>" placeholder="R3" id="txtR3" require="">
                            <br>
                            <br>
                            <label class="col-md-4 control-label" for="textinput">R4</label>  
                            <input type="text" name="txtR4"  value="<?php echo $txtR4; ?>" placeholder="R4" id="txtR4" require="">
                            <br>
                            <br>
                            <label class="col-md-4 control-label" for="textinput">Cuerpo</label>
                            <textarea class="form-control" id="txtCuerpo" name="txtCuerpo"><?php echo $txtCuerpo; ?></textarea>
                            <br>
                            <br>
                            <!-- Select Basic -->
                            <div class="form-group">

                                <div class="col-md-10">

                                    <label class="col-md-8 control-label" for="textinput">Respuesta Correcta</label> 
                                    <select id="Valselector" name="txtVal" class="form-control"> 

                                        <option value="1" <?php if ($txtVal == '1') {
                    ?>
                                                    selected="selected

                                                <?php } ?>
                                                ">Respuesta 1 </option>
                                        <option value="2" <?php if ($txtVal == '2') {
                                                    ?>
                                                    selected="selected"

                                                <?php } ?>
                                                >Respuesta 2 </option>
                                        <option value="3" <?php if ($txtVal == '3') {
                                                    ?>
                                                    selected="selected"

                                                <?php } ?>
                                                >Respuesta 3 </option>   
                                        <option value="4" <?php if ($txtVal == '4') {
                                                    ?>

                                                    selected="selected"
                                                <?php } ?>
                                                >Respuesta 4 </option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <button value="btnAdd" type="submit" name="accion1">Añadir</button>
                            <button value="btnModificar" type="submit" name="accion1">Modificar</button>
                            <button value="btnEliminar" type="submit" name="accion1">Eliminar</button>            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
} else {
        include_once 'plantillas/navbar-inicio.inc.php';

    if(COUNT($todos)===0){?>
        <div class="container-fluid bg-info1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><span class="label label-warning"  id="qid">No hay ninguna Flashcard de este tema aún</span></h5>
                    </div>
                            </div>
                            </div>
    <?php }else{
    include_once 'plantillas/flashcard_estudiante.php';
    ?>            


    <?php
}}
include_once 'plantillas/documento-cierre.inc.php';
?>


