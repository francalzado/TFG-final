<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';


if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], Conexion:: obtener_conexion());

    if ($validador->registro_valido()) {
        $usuario = new Usuario('', $validador->obtener_nombre(), $validador->obtener_apellidos(), $validador->obtener_email(), $validador->obtener_password(), '');
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

<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card mt-4 text-center">
            <div class="card-header">
                <h1 class="h4">
                    Registro
                </h1>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                    <?php
                    if (isset($_POST['enviar'])) {
                        include_once 'plantillas/registro_validado.inc.php';
                    } else {
                        include_once 'plantillas/registro_vacio.inc.php';
                    }
                    ?>
                </form>

                <a href="login.php">¿Ya tienes cuenta?</a>
                <a href="#">¿Has olvidado tu contraseña?</a>
            </div>
        </div>

    </div>
</div>




<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

