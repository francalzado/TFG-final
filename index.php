<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$todos = RepositorioUsuario :: obtener_todos(Conexion :: obtener_conexion());

Conexion :: cerrar_conexion();
$titulo = 'Inicio';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
?>

<ul class="navbar-nav ml-auto">
    <?php
    if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '0')) {
        ?>
        <!--            
                    <li>
                        <a class="nav-item nav-link" href="#">Cuenta NO activada</a>
                    </li>
                    <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
                    </li>
                    <li>
                        <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
                    </li>-->

        <div class="col-md-4 mx-auto">
            <div class="card mt-4 text-center">
                <div class="card-header">
                    <h1 class="h5">
                        <p>Te has registrado correctamente <b><?php echo $_SESSION['nombre'] ?></b></p>
                    </h1>
                </div>
                <div class="card-body">                    
                    <p>Tu cuenta no esta activa aun, habla con un administrador o espera a su activación</p>

                </div>

            </div>
        </div>
    </div>

    <?php
} else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '1')) {
    ?>


    <!--            
                <li>
                    <a class="nav-item nav-link" href="#">Estudiante</a>
                </li>
                <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
                </li>
    -->


    <?php
} else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '2')) {
    ?>

    <!--
                <li>
                    <a class="nav-item nav-link" href="#">Profesor</a>
                </li>
                <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
                </li>
    -->
    <?php
} else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '3')) {
    ?>
    <!--            
                <li>
                    <a class="nav-item nav-link" href="#">Administrador</a>
                </li>
                <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
                </li>
    -->


    <?php
} else if (!ControlSesion::sesion_iniciada()) {
    ?>

    <div class="jumbotron mt-4">
        <h1 class="display-6">Aplicación web para el seguimiento del aprendizaje activo en asignaturas de estudios universitarios! </h1>
        <p class="lead">Desarrollado por Francisco José Calzado Moya</p>

        <p>
            <img src="data:image/png;base64,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">
        </p>
        <hr class="my-4">
        <p>     </p>
    </div>

    <?php
}
?>

</ul>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
