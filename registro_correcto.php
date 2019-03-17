<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';


include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    Redireccion :: redirigir(RUTA_INDEX);
}

$titulo = 'Registro Correcto';
?>
<div class="row"></div>
<div class="col-md-4 mx-auto">
    <div class="card mt-4 text-center">
        <div class="card-header">
            <h1 class="h5">
                <p>Te has registrado correctamente <b><?php echo $nombre ?></b>!</p>
            </h1>
        </div>
        <div class="card-body">                   
            <p><a href="<?php echo RUTA_LOGIN ?>"> Inicia sesion</a> para comenzar a usar tu cuenta</p>

        </div>

    </div>
</div>
</div>


