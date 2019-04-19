<?php
include_once 'app/config.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';




    ControlSesion::cerrar_sesion();
    Redireccion::redirigir(RUTA_INDEX);
    ?>