<?php
include_once './Control/control_gestion_usuarios.inc.php';
?>

<div class="row col-lg-12">
    <div class='col-lg-6'>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <?php foreach ($todos as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario['id_usuario']; ?></td>            
                    <td><?php echo $usuario['nombre']; ?> <?php echo $usuario['apellidos']; ?></td>            
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['rol']; ?></td>
                    <td>
                        <form action="" method="post">

                            <input type="hidden" name="txtId_usuario" value="<?php echo $usuario['id_usuario']; ?>">
                            <input type="hidden" name="txtNombre" value="<?php echo $usuario['nombre']; ?>">
                            <input type="hidden" name="txtApellidos" value="<?php echo $usuario['apellidos']; ?> ">
                            <input type="hidden" name="txtEmail" value="<?php echo $usuario['email']; ?>">
                            <input type="hidden" name="txtRol" value="<?php echo $usuario['rol']; ?>">
                            <input type="submit" name="accion" value="Seleccionar">

                        </form>
                    </td>
                </tr>

            <?php } ?>


        </table>



    </div>
    <div class="col-lg-4">
        <div class="col-md-9 mx-auto">
            <div class="card mt-4 text-center">
                <div class="card-header">
                    <h1 class="h5">
                        <p>Datos del usuario </p>
                    </h1>
                </div>
                <div class="card-body">                    

                    <form action="" method="post">


                        <input type="hidden" name="txtId_usuario" value="<?php echo $txtId_usuario; ?>">
                        <br>
                        <br>
                        <input type="text" name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre" id="txtNombre" require="">
                        <br>
                        <br>
                        <input type="text" name="txtApellidos"  value="<?php echo $txtApellidos; ?>" placeholder="Apellidos" id="txtApellidos" require="">
                        <br>
                        <br>
                        <input type="text" name="txtEmail"  value="<?php echo $txtEmail; ?>" placeholder="Email" id="txtEmail" require="">
                        <br>
                        <br>
                        <!-- Select Basic -->
                        <div class="form-group">
                            <div class="col-md-10">
                                <select id="rolselector" name="txtRol" class="form-control">
                                    <option value="0" <?php if ($txtRol == '0') {
                ?>

                                                selected="selected"
                                            <?php } ?>
                                            >No admitido </option>
                                    <option value="1" <?php if ($txtRol == '1') {
                                                ?>
                                                selected="selected

                                            <?php } ?>
                                            ">Estudiante </option>
                                    <option value="2" <?php if ($txtRol == '2') {
                                                ?>
                                                selected="selected"

                                            <?php } ?>
                                            >Profesor </option>
                                    <option value="3" <?php if ($txtRol == '3') {
                                                ?>
                                                selected="selected"

                                            <?php } ?>
                                            >Admin </option>   
                                </select>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button value="btnModificar" type="submit" name="accion1">Modificar</button>
                        <button value="btnEliminar" type="submit" name="accion1">Eliminar</button>            
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

