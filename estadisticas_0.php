<?php
//
include_once './Control/control_estadisticas_0.inc.php';
?>


<?php
if ($todos == null) {
    ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5><span class="label label-warning"  id="qid">No hay datos recogidos</span></h5>
            </div>
            <div class="card-body">                   
                <p><a href="<?php echo RUTA_ESTADISTICAS?>">Consultar otro tipo de estadísticas</a></p>

            </div>
        </div>
    </div>
    <?php
} else {
    ?><form method="post" action="export.php" align="center">  
        <input type="submit" name="export" value="Exportar a CSV" class="btn btn-success" />  
        <input type="hidden" name="todos" value="<?php echo $todos; ?>" />
        <input type="hidden" name="stats" value="<?php echo $_GET['stats']; ?>" />
        <input type="hidden" name="id_tema" value="<?php echo $_GET['id_tema']; ?>" />

    </form> 
    <?php
    if ($_GET['stats'] == 1) { //TODO
        ?>
        <div class="col-md-11 mx-auto">

            <table id="tabla_stats" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Id Flashcard</th>
                        <th>Pregunta</th>
                        <th>Respuesta</th>
                        <th>Score</th>
                        <th>Fecha</th>

                    </tr>
                </thead>

                <?php foreach ($todos as $stats) { ?>
                    <tr>
                        <td><?php echo $stats['nombre']; ?></td>            
                        <td><?php echo $stats['apellidos']; ?></td>   
                        <td><?php echo $stats['email']; ?></td>
                        <td><?php echo $stats['id_fc']; ?></td>
                        <td><?php echo $stats['pregunta']; ?></td>
                        <td><?php echo $stats['respuesta']; ?></td>
                        <td><?php echo $stats['score']; ?></td>
                        <td><?php echo $stats['fecha']; ?></td>
                    </tr>

                <?php } ?>


            </table>
        </div>

        <?php
    } else if ($_GET['stats'] == 2) { //Ultimos Resultados por Alumno
        ?>

        <div class="col-md-11 mx-auto">

            <table id="tabla_stats"  class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id Usuario </th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Id Flashcard</th>
                        <th>Respuesta</th>
                        <th>Score</th>
                        <th>Fecha</th>

                    </tr>
                </thead>

                <?php foreach ($todos as $stats) { ?>
                    <tr>
                        <td><?php echo $stats['id_usuario']; ?></td>            
                        <td><?php echo $stats['nombre']; ?></td>   
                        <td><?php echo $stats['apellidos']; ?></td>   
                        <td><?php echo $stats['email']; ?></td>
                        <td><?php echo $stats['id_fc']; ?></td>
                        <td><?php echo $stats['respuesta']; ?></td>
                        <td><?php echo $stats['score']; ?></td>
                        <td><?php echo $stats['fecha']; ?></td>
                    </tr>

                <?php } ?>


            </table>
        </div>
        <?php
    } else if ($_GET['stats'] == 3) { //Respuestas por Flashcards
        ?>
        <div class="col-md-11 mx-auto">

            <table id="tabla_stats"  class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id Flashcard</th>
                        <th>Pregunta</th>
                        <th>Respuesta</th>
                        <th>Total de Respuestas</th>
                        <th>Respuesta Correcta</th>
                    </tr>
                </thead>

                <?php foreach ($todos as $stats) { ?>
                    <tr>
                        <td><?php echo $stats['id_fc']; ?></td>            
                        <td><?php echo $stats['pregunta']; ?></td>   
                        <td><?php echo $stats['respuesta']; ?></td>
                        <td><?php echo $stats['TotalRespuestas']; ?></td>
                        <td><?php echo $stats['RespuestaCorrecta']; ?></td>
                    </tr>

                <?php } ?>


            </table>
        </div>

        <?php
    } else if ($_GET['stats'] == 4) { //AVG de Score
        ?>
        <div class="col-md-11 mx-auto">

            <table id="tabla_stats"  class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id Flashcard</th>
                        <th>Pregunta</th>
                        <th>Score Medio</th>


                    </tr>
                </thead>

                <?php foreach ($todos as $stats) { ?>
                    <tr>
                        <td><?php echo $stats['id_fc']; ?></td>            
                        <td><?php echo $stats['pregunta']; ?></td>   
                        <td><?php echo $stats['AVG(score)']; ?></td>
                    </tr>

                <?php } ?>


            </table>
        </div>
        <?php
    }
}
?>



