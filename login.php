<?php
include_once './Control/control_login.inc.php';
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
