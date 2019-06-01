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
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$baja = (isset($_POST['baja'])) ? $_POST['baja'] : "";
$accion_asignatura = (isset($_POST['accion_asignatura'])) ? $_POST['accion_asignatura'] : "";

$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$int = (int) $txtId_usuario;
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



if ($accion_asignatura) {

    try {
//REDIRECCIONAMIENTO A LOS TEMAS DE LA ASIGNATURA SELECCIONADA
        Redireccion :: redirigir(RUTA_NUEVA_ASIGNATURA);
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}



if ($baja) {

    try {
//REDIRECCIONAMIENTO A LOS TEMAS DE LA ASIGNATURA SELECCIONADA
        $sql = "DELETE FROM  usuarioasignatura WHERE (id_usuario = :Id_usuario && id_asignatura = :Id_asignatura) ";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':Id_usuario', $_SESSION['id_usuario']);
        $sentencia->bindParam(':Id_asignatura', $txtId_asignatura);
        $usuario_matriculado = $sentencia->execute();
        Redireccion :: redirigir(RUTA_MIS_ASIGNATURAS . '?id_usuario=' . $_SESSION['id_usuario']);
        print $_SESSION['id_usuario'];
        print $txtId_asignatura;
    } catch (PDOException $ex) {
        print 'Error' . $ex->getMessage();
    }
}
?>
