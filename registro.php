<?php
include_once './Control/control_registro.inc.php';
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

