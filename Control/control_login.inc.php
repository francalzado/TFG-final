<?php
include_once 'app/config.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_INDEX);
}

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
if (isset($_POST['login'])) {
    Conexion :: abrir_conexion();
    $validador = new ValidadorLogin($_POST['email'], $_POST['password'], Conexion::obtener_conexion());

    if ($validador->obtener_error() === '' && !is_null($validador->obtener_usuario())) {
        //Iniciar Sesion
        ControlSesion::iniciar_sesion($validador->obtener_usuario()->obtenerId(), $validador->obtener_usuario()->obtenerEmail(), $validador->obtener_usuario()->obtenerNombre(), $validador->obtener_usuario()->obtenerRol(), 0);
        //Redirigir Usuario a su index



        if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '0')) {

            Redireccion::redirigir(RUTA_INDEX . '?id_usuario=' . $_SESSION['id_usuario']);
        } else {
            Redireccion::redirigir(RUTA_MIS_ASIGNATURAS . '?id_usuario=' . $_SESSION['id_usuario']);
        }
    } else {
        ?>

        <div class ='alert alert-danger' role = 'alert'>
            Error al iniciar sesion
        </div>
        <?php
    }
    Conexion :: cerrar_conexion();
}
$titulo = 'Login';
?>

