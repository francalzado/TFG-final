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
$accion_add_flashcard = (isset($_POST['add_flashcard'])) ? $_POST['add_flashcard'] : "";
$accion_recurso = (isset($_POST['accion_recursos'])) ? $_POST['accion_recursos'] : "";
$accion_estadisticas = (isset($_POST['accion_estadisticas'])) ? $_POST['accion_estadisticas'] : "";
$accion_tema = (isset($_POST['accion_tema'])) ? $_POST['accion_tema'] : "";
$_SESSION['id_tema'] = $txtId_tema;

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
} else if ($accion_estadisticas) {
    try {
//REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
        Redireccion :: redirigir(RUTA_ESTADISTICAS . '?id_tema=' . $txtId_tema);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
} else if ($accion_tema) {
    try {
//REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
        Redireccion :: redirigir(RUTA_NUEVO_TEMA . '?id_asignatura=' . $id_asignatura);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}
?>

<div class="row col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Temario</th>
                <th>Recursos Visuales</th>
                <th>Flashcards</th>
                <th>Estadísticas</th>

            </tr>
        </thead>
        <?php foreach ($todas as $tema) { ?>
            <tr>
                <td><?php echo $tema['titulo']; ?></td>      
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_tema" value="<?php echo $tema['id_tema']; ?>">
                        <button class="btn btn-light"  type="submit" name="accion_recursos" value="Acceder">Acceder</button>

                        <?php
                        if (ControlSesion::sesion_iniciada() && ((ControlSesion::getRol() == '2') || (ControlSesion::getRol() == '3'))) {
                            ?>
                        <button class="btn btn-light"  type="submit" name="add_recurso" style="margin-left: 70px" value="Añadir Nuevo Recurso">Añadir Nuevo Recurso</button>

                            <?php
                        }
                        ?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_tema" value="<?php echo $tema['id_tema']; ?>">
                        <button class="btn btn-light"  type="submit" name="accion_flashcard" value="Acceder">Acceder</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_tema" value="<?php echo $tema['id_tema']; ?>">
                        <button class="btn btn-light"  type="submit" name="accion_estadisticas" value="Acceder">Acceder</button>



                    </form>


                </td>

            </tr>
            <?php
        }
        if (ControlSesion::getRol() == '3') {
            ?>


            <tfoot>
                <tr>
                    <th colspan="5">
                        <form action method="POST">
                        <button class="btn btn-light"  type="submit" name="accion_tema" value="Nuevo Tema">Nuevo Tema</button>                            
                        </form>
                    </th>
                </tr>
            </tfoot>


            <?php
        }
        ?>

    </table>
</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>



