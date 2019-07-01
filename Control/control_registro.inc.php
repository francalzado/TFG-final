<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Asignatura.inc.php';


if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], 
            Conexion:: obtener_conexion());

    if ($validador->registro_valido()) {
        $pass_cifrada = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $usuario = new Usuario('', $validador->obtener_nombre(), $validador->obtener_apellidos(), $validador->obtener_email(), $pass_cifrada, '');
        $usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);
        if ($usuario_insertado) {
            Redireccion :: redirigir(RUTA_REGISTRO_CORRECTO . '?nombre=' . $usuario->obtenerNombre());
        } else {
            Redireccion :: redirigir(RUTA_INDEX . '?nombre=' . $usuario->obtenerNombre());
        }

        Conexion :: cerrar_conexion();
    }
}

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
Conexion :: cerrar_conexion();
$titulo = 'Registro';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
?>

