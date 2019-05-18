<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$id_tema = $_GET['id_tema'];
$txtId_asignatura = (isset($_POST['txtId_asignatura'])) ? $_POST['txtId_asignatura'] : "";
$todas = RepositorioAsignatura :: obtener_temas_asignaturas(Conexion :: obtener_conexion(), $id_tema);
$recursos = RepositorioAsignatura :: obtener_recursos(Conexion :: obtener_conexion(), $id_tema);
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$titulo = 'Recursos Visuales';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
$txtId_recurso = (isset($_POST['txtId_recurso'])) ? $_POST['txtId_recurso'] : "";
$txtId_tema = (isset($_POST['txtId_tema'])) ? $_POST['txtId_tema'] : "";
$txtId_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : "";
$accion_flashcard = (isset($_POST['accion_flashcard'])) ? $_POST['accion_flashcard'] : "";
$accion_recurso = (isset($_POST['accion_recursos'])) ? $_POST['accion_recursos'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

if($accion){
    echo $txtId_recurso."hola";
    $usuario_modificado = false;
        try {
            $sql = "DELETE from recurso WHERE id_recurso= :Id_recurso";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':Id_recurso', $txtId_recurso);
            $usuario_modificado = $sentencia->execute();
        } catch (PDOException $ex) {
            print 'Error' . $ex->getMessage();
        }
        if ($usuario_modificado) {
            //print 'Se ha modificado correctamente';
            Redireccion :: redirigir(RUTA_RECURSOS. '?id_tema=' . $txtId_tema);
        }
        if (!$usuario_modificado)
            echo 'No se ha modificado correctaente';
        //Redireccion :: redirigir(RUTA_GESTION_USUARIOS);

}

?>


<br>
<br>
<div class="col-md-4 mx-auto">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Videos</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <?php foreach ($recursos as $recurso) { ?>
            <tr>
                <td>
                    <h4><?php echo $recurso['titulo']; ?></h4>
                    <iframe width="560" height="315" src="<?php echo $recurso['enlace']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></video> </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_recurso" value="<?php echo $recurso['id_recurso']; ?>">
                        <input type="hidden" name="txtId_tema" value="<?php echo $recurso['id_tema']; ?>">
                        <button  class="btn btn-danger align-content-md-center" value="Eliminar" type="submit" name="accion">Eliminar</button>


                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>



