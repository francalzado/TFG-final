<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';
include_once 'app/Usuario.inc.php';

Conexion :: abrir_conexion();
$txtId_asignatura = (isset($_POST['txtId_asignatura'])) ? $_POST['txtId_asignatura'] : "";
$id_usuario = $_GET['id_usuario'];
$txtId_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : "";
$usuario = new Usuario($txtId_usuario, '', '', '', '', '', '');
$id_usuario = $_GET['id_usuario'];
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
//ver por qué al pasar $txtId_usuario PETA 
//MUESTRA LAS ASIGNATURAS DEL USUARIO CON ID DE LA SESION
//$mis_asignaturas = RepositorioAsignatura :: obtener_mis_asignaturas(Conexion :: obtener_conexion(),$usuario->obtenerId());
//MUESTRA LAS ASIGNATURAS DEL USUARIO CON ID 4
$int = (int)$txtId_usuario;
$mis_asignaturas = RepositorioAsignatura :: obtener_mis_asignaturas(Conexion :: obtener_conexion(), $id_usuario);
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$titulo = 'Mis Asignaturas';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';

if ($accion) {

    try {
//REDIRECCIONAMIENTO A LOS TEMAS DE LA ASIGNATURA SELECCIONADA
     Redireccion :: redirigir(RUTA_TEMAS . '?id_asignatura=' . $txtId_asignatura);
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
                <th>Asignatura</th>
                <th>Curso</th>
                <th>Cuatrimestre</th>
                <th>Accion</th>

            </tr>
        </thead>
<?php foreach ($mis_asignaturas as $asignatura) { ?>
            <tr>
                <td><?php echo $asignatura['id_asignatura']; ?></td>            
                <td><?php echo $asignatura['nombre']; ?></td>            
                <td><?php echo $asignatura['curso']; ?></td>
                <td><?php echo $asignatura['cuatrimestre']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="txtId_asignatura" value="<?php echo $asignatura['id_asignatura']; ?>">
                        <input type="submit" name="accion" value="Acceder">

                    </form>
                </td>
            </tr>


<?php } ?>


    </table>

</div>
    <?php
    include_once 'plantillas/documento-cierre.inc.php';
    ?>