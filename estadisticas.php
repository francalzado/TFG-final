<?php
include_once './Control/control_estadisticas.inc.php';
?>
<div class="row col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id Usuario</th>
                <th>Id Flashcard</th>
                <th>Respuesta</th>
                <th>Fecha</th>

            </tr>
        </thead>
        <?php foreach ($todas as $asignatura) { ?>
            <tr>
                <td><?php echo $asignatura['id_usuario']; ?></td>            
                <td><?php echo $asignatura['id_fc']; ?></td>            
                <td><?php echo $asignatura['respuesta']; ?></td>
                <td><?php echo $asignatura['fecha']; ?></td>
                    
                </td>
            </tr>
        <?php } ?>
