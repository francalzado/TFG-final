<?php
//
include_once './Control/control_estadisticas_0.inc.php';
?>


<?php
if ($_GET['stats'] == 1) { //TODO
    ?>
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


    <?php
} else if ($_GET['stats'] == 2) { //Ultimos Resultados por Alumno
    ?>


    <table id="tabla_stats"  class="table table-bordered">
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

    <?php
} else if ($_GET['stats'] == 3) { //Respuestas por Flashcards
    ?>

    <table id="tabla_stats"  class="table table-bordered">
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


    <?php
} else if ($_GET['stats'] == 4) { //AVG de Score
    ?>

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
<script src="js/FileSaver.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min_1.js" type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/tableexport.min.js" type="text/javascript"></script>
<script>
    $('#tabla_stats').tableExport();
</script>
    <?php
}
?>



