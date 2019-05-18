<?php
include_once './Control/control_asignaturas.inc.php';
if (COUNT($todas) === 0) {
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><span class="label label-warning"  id="qid">No hay mas asignaturas por matricular</span></h3>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>


    <br>
    <br>
    <div class='col-md-8 mx-auto'> 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Asignatura</th>
                    <th>Curso</th>
                    <th>Cuatrimestre</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <?php foreach ($todas as $asignatura) { ?>
                <tr>
                    <td><?php echo $asignatura['nombre']; ?></td>            
                    <td><?php echo $asignatura['curso']; ?></td>
                    <td><?php echo $asignatura['cuatrimestre']; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="txtId_asignatura" value="<?php echo $asignatura['id_asignatura']; ?>">
                            <button class="btn btn-light"  type="submit" name="accion" value="Matricular">Matricular</button>

                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>

    <?php
}
include_once 'plantillas/documento-cierre.inc.php';
?>


