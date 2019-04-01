<?php

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$todas = RepositorioAsignatura :: obtener_todos(Conexion :: obtener_conexion(),$_SESSION['id_usuario']);
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$titulo = 'Asignaturas Totales';


$txtId_asignatura = (isset($_POST['txtId_asignatura'])) ? $_POST['txtId_asignatura'] : "";
$txtId_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

if ($accion) {
    $usuario_matriculado = false;
    try {
        $sql = "INSERT INTO usuarioasignatura(id_usuario,id_asignatura) VALUES(:Id_usuario, :Id_asignatura) ";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':Id_usuario', $txtId_usuario);
        $sentencia->bindParam(':Id_asignatura', $txtId_asignatura);
        $usuario_matriculado = $sentencia->execute();
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
    if ($usuario_matriculado) {
        Redireccion :: redirigir(RUTA_TODAS_ASIGNATURAS);

        print 'Se ha matriculado correctamente';
    }
    if (!$usuario_matriculado) {
        print 'No se ha modificado correctaente';
    }
}
    if(COUNT($todas)===0){
        ?>
         <div class="container-fluid bg-info1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><span class="label label-warning"  id="qid">No hay mas asignaturas por matricular</span></h3>
                    </div>
                            </div>
                            </div>
  <?php      
    }else{
?>

<div class="row col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asignatura</th>
                <th>Curso</th>
                <th>Cuatrimestre</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <?php foreach ($todas as $asignatura) { ?>
            <tr>
                <td><?php echo $asignatura['id_asignatura']; ?></td>            
                <td><?php echo $asignatura['nombre']; ?></td>            
                <td><?php echo $asignatura['curso']; ?></td>
                <td><?php echo $asignatura['cuatrimestre']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_asignatura" value="<?php echo $asignatura['id_asignatura']; ?>">
                        <input type="submit" name="accion" value="Matricular">
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


