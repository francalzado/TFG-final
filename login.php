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
        ControlSesion::iniciar_sesion($validador->obtener_usuario()->obtenerId(), $validador->obtener_usuario()->obtenerEmail(),$validador->obtener_usuario()->obtenerNombre(),$validador->obtener_usuario()->obtenerRol(),0);
        //Redirigir Usuario a su index
        Redireccion::redirigir(RUTA_INDEX);
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
<div class="row"></div>
<div class="col-md-4 mx-auto">
    <div class="card mt-4 text-center">
        <div class="card-header">
            <h1 class="h4">
                Login
            </h1>
        </div>
        <div class="card-body">
            <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="@ujaen.es" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" placeholder="Contraseña" required>
                </div>
                <button type="submit"class="btn btn-primary btn-block" name="login">
                    Entrar 
                </button>
                <br>
                <a href="#">¿Has olvidado tu contraseña?</a>

            </form>
        </div>
    </div>
</div>
</div>
