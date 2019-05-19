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
                <p><a href="<?php echo RUTA_ESTADISTICAS ?>">Consultar otro tipo de estadísticas</a></p>

            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <br>
    <form method="post" action="export.php" align="center">  
        <input type="submit" name="export" value="Exportar a CSV" class="btn btn-light" />  
        <input type="hidden" name="todos" value="<?php echo $todos; ?>" />
        <input type="hidden" name="stats" value="<?php echo $_GET['stats']; ?>" />
        <input type="hidden" name="id_tema" value="<?php echo $_GET['id_tema']; ?>" />

    </form> 
    <?php
    if ($_GET['stats'] == 1) { //TODO
        ?>
        <div class="col-md-11 mx-auto">

            <table id="tabla_stats" class="table table-borderless">
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

            <table id="tabla_stats"  class="table table-borderless">
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

        <script type="text/javascript">
            google.charts.load('current', {'packages': ['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Estudiante', 'No Contestada', 'Respuesta 1', 'Respuesta 2', 'Respuesta 3', 'Respuesta 4'],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2014', 10, 40, 20, 15, 19],
                    ['2015', 10, 40, 20, 15, 19],
                    ['2016', 103, 40, 20, 15, 19],
                    ['2017', 101, 40, 20, 15, 19],
                ]);

                var options = {
                    chart: {
                        title: 'Estadísticas',
                        subtitle: 'Tema 1 Redes',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <div class="col-md-11 mx-auto" id="columnchart_material" style="width: 1600px; height: 500px;"></div>

        <?php
    } else if ($_GET['stats'] == 3) { //Respuestas por Flashcards
        for ($i = 0; $i < $contador[0][0]; $i++) {
            $respuestas0[$i] = 0;
            $respuestas1[$i] = 0;
            $respuestas2[$i] = 0;
            $respuestas3[$i] = 0;
            $respuestas4[$i] = 0;
        }
        ?>
        <div class="col-md-11 mx-auto">

            <table id="tabla_stats"  class="table table-borderless">
                <thead>
                    <tr>
                        <th>Id Flashcard</th>
                        <th>Pregunta</th>
                        <th>Respuesta</th>
                        <th>Total de Respuestas</th>
                        <th>Respuesta Correcta</th>
                    </tr>
                </thead>

                <?php
                $i = -1;
                $flashcard_actual = 0;
                foreach ($todos as $stats) {
                    ?>
                    <tr>
                        <td><?php echo $stats['id_fc']; ?></td> 
                        <?php
                        if ($stats['id_fc'] != $flashcard_actual) {
                            $i++;
                            $flashcard_actual = $stats['id_fc'];
                        }
                        ?>
                        <td><?php echo $stats['pregunta']; ?></td>   
                        <td><?php echo $stats['respuesta']; ?></td>
                        <?php ${"respuestas" . $stats['respuesta']}[$i] = $stats['TotalRespuestas']; ?>
                        <td><?php echo $stats['TotalRespuestas'];
                        ?></td>
                        <td><?php echo $stats['RespuestaCorrecta']; ?></td>

                    </tr>

                    <?php
                }
                //consigo los array de respuestas correctamente
//                print_r($respuestas0);
//                print_r($respuestas1);
//                print_r($respuestas2);
//                print_r($respuestas3);
//                print_r($respuestas4);
//                echo $i;
                ?>


            </table>
        </div>

        <script type="text/javascript">
            google.charts.load('current', {'packages': ['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Flashcard', 'No Contestada', 'Respuesta 1', 'Respuesta 2', 'Respuesta 3', 'Respuesta 4'],
        <?php
        for ($x = 0; $x <= (($contador[0][0]) - 1); $x++) {
            ?>
                        ['<?php echo $identificadores[$x][0]; ?>',
            <?php echo $respuestas0[$x]; ?>,
            <?php echo $respuestas1[$x]; ?>,
            <?php echo $respuestas2[$x]; ?>,
            <?php echo $respuestas3[$x]; ?>,
            <?php echo $respuestas4[$x]; ?>
                        ],

        <?php } ?>
                    //['52', 6, 2, 0, 0, 9], //coger array [0] de cada $respuesta, FLASHCARD = $identificadores[$i][0]
                ]);

                var options = {
                    chart: {
                        title: 'Estadísticas',
                        subtitle: 'Tema 2 Redes',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <div class="col-md-11 mx-auto" id="columnchart_material" style="width: 1600px; height: 500px;"></div>

        <?php
    } else if ($_GET['stats'] == 4) { //AVG de Score
        ?>
        <div class="col-md-11 mx-auto">

            <table id="tabla_stats"  class="table table-borderless">
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
        
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Flashcard', 'Score Medio'],
        <?php
        for ($x = 0; $x <= (($contador[0][0]) - 1); $x++) {
            ?>

                    ['<?php echo $todos[$x][0]; ?>',
            <?php echo $todos[$x][2]; ?>
                    ],
        <?php } ?>
                ]);
                
                
                
               
                var options = {
                    chart: {
                        title: 'Estadísticas',
                        subtitle: 'Tema 3 Redes',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <div class="col-md-11 mx-auto" id="columnchart_material" style="width: 1600px; height: 500px;"></div>

        <?php
    }
}
?>

        <br>
        <br>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>