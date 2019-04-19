
<?php
include_once './Control/control_mis_asignaturas.inc.php';
if (COUNT($mis_asignaturas) === 0) {
    ?>
    <div class="container-fluid bg-info1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><span class="label label-warning"  id="qid">No estas matriculado en ninguna asignatura</span></h5>
                </div>
                <div class="card-body">                   
                    <p><a href="<?php echo RUTA_TODAS_ASIGNATURAS ?>"> Matriculate en una asignatura</a></p>

                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="row col-lg-12">
            <table class="table table-bordered">
                <thead>

                    <tr>
                        <th>Asignatura</th>
                        <th>Curso</th>
                        <th>Cuatrimestre</th>
                        <th>Accion</th>
                        <th>Darse da baja</th>             
                    </tr>
                </thead>
                <?php foreach ($mis_asignaturas as $asignatura) { ?>
                    <tr>
                        <td><?php echo $asignatura['nombre']; ?></td>            
                        <td><?php echo $asignatura['curso']; ?></td>
                        <td><?php echo $asignatura['cuatrimestre']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId_asignatura" value="<?php echo $asignatura['id_asignatura']; ?>">
                                <input type="submit" name="accion" value="Acceder">

                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId_asignatura" value="<?php echo $asignatura['id_asignatura']; ?>">
                                <input type="submit" name="baja" value="Dar de baja">

                            </form>
                        </td>

                    </tr>


                <?php } ?>

                <?php
            }
            if (ControlSesion::getRol() == '3') {
                ?>


                <tfoot>
                    <tr>
                        <th colspan="6">
                            <form action method="POST">
                                <input type="submit" name="accion_asignatura" value="Nueva Asignatura">
                            </form>
                        </th>
                    </tr>
                </tfoot>

            </table>

        </div>
        <?php
        include_once 'plantillas/documento-cierre.inc.php';
    }
    ?>