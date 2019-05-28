<?php
include_once 'app/RepositorioUsuario.inc.php';
Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
Conexion :: cerrar_conexion();
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--PARTE DEL PRINCIPIO DE LA NAV BAR-->
    <a class="navbar-brand" href="">AppLearn</a>
    <?php
    if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '0')) {
        ?>


        <?php
    } else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '1')) {
        ?>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-item nav-link" href="<?php echo RUTA_MIS_ASIGNATURAS . '?id_usuario=' . $_SESSION['id_usuario'] ?>">Mis Asignaturas</a>
                <a class="nav-item nav-link" href="<?php echo RUTA_ASIGNATURAS ?>">Asignaturas no matriculadas</a>

            </div>
        </div>      



        <?php
    } else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '2')) {
        ?>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?php echo RUTA_MIS_ASIGNATURAS . '?id_usuario=' . $_SESSION['id_usuario'] ?>">Mis Asignaturas</a>
                <a class="nav-item nav-link" href="<?php echo RUTA_ASIGNATURAS ?>">Asignaturas no matriculadas</a>
                <a class="nav-item nav-link" href="<?php echo RUTA_ESTADISTICAS ?>">Estadisticas</a>


            </div>
        </div>      

        <?php
    } else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '3')) {
        ?>


        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?php echo RUTA_MIS_ASIGNATURAS . '?id_usuario=' . $_SESSION['id_usuario'] ?>">Mis Asignaturas</a>
                <a class="nav-item nav-link" href="<?php echo RUTA_ASIGNATURAS ?>">Asignaturas no matriculadas</a>
                <a class="nav-item nav-link" href="<?php echo RUTA_ESTADISTICAS ?>">Estadisticas</a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion de Usuarios
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo RUTA_GESTION_USUARIOS ?>">Todos los usuarios</a>
                        <a class="dropdown-item" href="<?php echo RUTA_NUEVOS_USUARIOS ?>">Nuevos Usuarios</a>
                    </div>
                </li>



            </div>
        </div>      

        <?php
    } else if (!ControlSesion::sesion_iniciada()) {
        ?>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?php echo RUTA_INFORMACION ?>">Información</a>
                <a class="nav-item nav-link" href="#">Otra Pestaña</a>

            </div>
        </div>      

        <?php
    }
    ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <!--PARTE DEL FINAL DE LA NAV BAR-->
    <ul class="navbar-nav ml-auto">
        <?php
        if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '0')) {
            ?>

            <li>
                <a class="nav-item nav-link" href="#">Cuenta NO activada</a>
            </li>
            <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
            </li>
            <li>
                <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
            </li>



            <?php
        } else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '1')) {
            ?>

            <li>
                <a class="nav-item nav-link" href="#">Estudiante</a>
            </li>
            <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
            </li>
            <li>
                <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
            </li>


            <?php
        } else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '2')) {
            ?>
            <li>
                <a class="nav-item nav-link" href="#">Profesor</a>
            </li>
            <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
            </li>
            <li>
                <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
            </li>

            <?php
        } else if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() === '3')) {
            ?>
            <li>
                <a class="nav-item nav-link" href="#">Administrador</a>
            </li>
            <li><a class="nav-item nav-link" href="#"><?php echo ' ' . $_SESSION['email']; ?></a>
            </li>
            <li>
                <a class="nav-item nav-link" href="<?php echo RUTA_LOGOUT ?>">Cerrar Sesion</a>
            </li>



            <?php
        } else if (!ControlSesion::sesion_iniciada()) {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Usuarios Registrados:
                    <?php
                    echo $total_usuarios;
                    ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTA_LOGIN ?>"> Iniciar Sesion</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="registro.php">Registro</a>
            </li>        

            <?php
        }
        ?>

    </ul>
</nav>