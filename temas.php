<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$id_asignatura = $_GET['id_asignatura'];
$txtId_asignatura = (isset($_POST['txtId_asignatura'])) ? $_POST['txtId_asignatura'] : "";
$todas = RepositorioAsignatura :: obtener_temas_asignaturas(Conexion :: obtener_conexion(), $id_asignatura);
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$titulo = 'Temas';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
$txtId_asignatura = (isset($_POST['txtId_asignatura'])) ? $_POST['txtId_asignatura'] : "";
$txtId_tema = (isset($_POST['txtId_tema'])) ? $_POST['txtId_tema'] : "";
$txtId_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : "";
$accion_flashcard = (isset($_POST['accion_flashcard'])) ? $_POST['accion_flashcard'] : "";
$accion_add_recurso = (isset($_POST['add_recurso'])) ? $_POST['add_recurso'] : "";
$accion_add_flashcard= (isset($_POST['add_flashcard'])) ? $_POST['add_flashcard'] : "";
$accion_recurso = (isset($_POST['accion_recursos'])) ? $_POST['accion_recursos'] : "";

if ($accion_recurso) {
    try {
//REDIRECCIONAMIENTO A LOS RECURSOS DE CADA TEMA
        Redireccion :: redirigir(RUTA_RECURSOS . '?id_tema=' . $txtId_tema);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
} else if ($accion_flashcard) {
    try {
//REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
        Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $txtId_tema);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
} else if ($accion_add_recurso) {
    try {
//REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
        Redireccion :: redirigir(RUTA_NUEVO_RECURSO . '?id_tema=' . $txtId_tema);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
} else if ($accion_add_flashcard) {
    try {
//REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
        Redireccion :: redirigir(RUTA_NUEVA_FLASHCARD . '?id_tema=' . $txtId_tema);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}
?>

<div class="row col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Temario</th>
                <th>Recursos Visuales</th>
                <th>Flashcards</th>

            </tr>
        </thead>
        <?php foreach ($todas as $tema) { ?>
            <tr>
                <td><?php echo $tema['id_tema']; ?></td>            
                <td><?php echo $tema['titulo']; ?></td>      
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_tema" value="<?php echo $tema['id_tema']; ?>">
                        <input type="submit" name="accion_recursos" value="Acceder">
                        <?php
                        if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '2')) {
                            ?>
                        <br>
                        <br>
                        <input type="submit" name="add_recurso" value="Añadir Nuevo Recurso">

                            <?php
                        }
                        ?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_tema" value="<?php echo $tema['id_tema']; ?>">
                        <input type="submit" name="accion_flashcard" value="Acceder">
                        <?php
                        if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '2')) {
                            ?>
                        <br>
                        <br>
                        <input type="submit" name="add_flashcard" value="Añadir Nueva Flashcard">

                            <?php
                        }
                        ?>
                    </form>
                </td>

            </tr>
        <?php } ?>
    </table>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>



