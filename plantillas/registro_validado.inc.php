<div class="form-group">
    <input type="text" class="form-control" name="nombre" placeholder="Nombre"<?php $validador->mostrar_nombre() ?> placeholder="Nombre" autofocus>
    <?php
    $validador->mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" placeholder="Apellidos" autofocus>
</div>
<div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Email"<?php $validador->mostrar_email() ?> value="@ujaen.es">
    <?php
    $validador->mostrar_error_email();
    ?>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Contraseña" placeholder="Contraseña">
    <?php
    $validador->mostrar_error_password();
    ?>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="confirm_password" placeholder="Repetir Contraseña" placeholder="Repetir Contraseña">
    <?php
    $validador->mostrar_error_confirm_password();
    ?>
</div>
<button type="submit"class="btn btn-primary btn-block" name="enviar">
    Registrar 
</button>