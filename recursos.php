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
$txtId_asignatura = (isset($_POST['txtId_asignatura'])) ? $_POST['txtId_asignatura'] : "";
$txtId_tema = (isset($_POST['txtId_tema'])) ? $_POST['txtId_tema'] : "";
$txtId_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : "";
$accion_flashcard = (isset($_POST['accion_flashcard'])) ? $_POST['accion_flashcard'] : "";
$accion_recurso = (isset($_POST['accion_recursos'])) ? $_POST['accion_recursos'] : "";
?>

<div class="row col-lg-12">
<table class="blueTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Videos</th>

            </tr>
        </thead>
        <?php foreach ($recursos as $recurso) { ?>
            <tr>
                <!--<td><?php echo $recurso['id_tema']; ?></td>-->            
                <td><?php echo $recurso['id_recurso']; ?></td>   
                <td><iframe width="560" height="315" src="<?php echo $recurso['enlace']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></video> </td>
    <!--                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_tema" value="<?php echo $tema['id_tema']; ?>">
                        <input type="submit" name="accion_recursos" value="Acceder">
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_tema" value="<?php echo $tema['id_tema']; ?>">
                        <input type="submit" name="accion_flashcard" value="Acceder">
                    </form>
                </td>-->

            </tr>
        <?php } ?>
    </table>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>



