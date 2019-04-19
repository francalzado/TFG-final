<?php
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$todas = RepositorioAsignatura :: obtener_todos(Conexion :: obtener_conexion(), $_SESSION['id_usuario']);
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
?>
