<?php
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
include_once 'app/Conexion.inc.php';
Conexion :: abrir_conexion();
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$todas = RepositorioFlashcard::estadisticas($conexion,$_GET['id_tema']);

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
                <td>
                    
                </td>
            </tr>
        <?php } ?>
