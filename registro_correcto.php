<?php
include_once './Control/control_registro_correcto.inc.php';
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


