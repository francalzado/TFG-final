<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$nuevos = RepositorioUsuario :: obtener_nuevos(Conexion :: obtener_conexion());
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$titulo = 'Inicio';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
$txtId_usuario = (isset($_POST['txtId_usuario'])) ? $_POST['txtId_usuario'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtApellidos = (isset($_POST['txtApellidos'])) ? $_POST['txtApellidos'] : "";
$txtEmail = (isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : "";
$txtRol = (isset($_POST['txtRol'])) ? $_POST['txtRol'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$accion1 = (isset($_POST['accion1'])) ? $_POST['accion1'] : "";

switch ($accion1) {
    case "btnAceptar":
        $usuario_modificado = false;
        try {
            $sql = "UPDATE usuarios SET
                rol = 1 
                WHERE rol = 0";
            $sentencia = $conexion->prepare($sql);
            $usuario_modificado = $sentencia->execute();
        } catch (PDOException $ex) {
            print 'Error' . $ex->getMessage();
        }
        if ($usuario_modificado) {
            print 'Se ha modificado correctamente';
            Redireccion :: redirigir(RUTA_GESTION_USUARIOS);
        }
        if (!$usuario_modificado)
            print 'No se ha modificado correctaente';
        break;
    case "btnModificar":
        $usuario_modificado = false;
        try {
            $sql = "UPDATE usuarios SET
                id_usuario = :Id_usuario,
                nombre = :Nombre,
                apellidos = :Apellidos,
                email = :Email,
                rol = :Rol 
                WHERE id_usuario = :Id_usuario";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':Id_usuario', $txtId_usuario);
            $sentencia->bindParam(':Nombre', $txtNombre);
            $sentencia->bindParam(':Apellidos', $txtApellidos);
            $sentencia->bindParam(':Email', $txtEmail);
            $sentencia->bindParam(':Rol', $txtRol);
            $usuario_modificado = $sentencia->execute();
        } catch (PDOException $ex) {
            print 'Error' . $ex->getMessage();
        }
        if ($usuario_modificado) {
            print 'Se ha modificado correctamente';
            Redireccion :: redirigir(RUTA_NUEVOS_USUARIOS);
        }
        if (!$usuario_modificado)
            print 'No se ha modificado correctaente';
        Redireccion :: redirigir(RUTA_GESTION_USUARIOS);

        break;
    case "btnEliminar":
        $usuario_borrado = false;
        try {
            //DELETE MAS COMPLEJO YA QUE HAY QUE BORRAR TODO LO RELACIONADO CON EL ( ES FOREIGN KEY DE VARIAS COSAS) 
            //FUNCIONA SI SU ID NO ES CLAVE DE OTRAS TABLAS!!!!!
            $sql = "DELETE from usuarios
                WHERE id_usuario = :Id_usuario";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':Id_usuario', $txtId_usuario);
            $usuario_borrado = $sentencia->execute();
        } catch (PDOException $ex) {
            print 'Error' . $ex->getMessage();
        }
        if ($usuario_borrado) {
            Redireccion :: redirigir(RUTA_GESTION_USUARIOS);
            print 'Se ha borrado correctamente';
        }
        if (!$usuario_borrado)
            Redireccion :: redirigir(RUTA_GESTION_USUARIOS);
        print 'No se ha borrado correctaente';


        break;
}
?>
<?php
if (COUNT($nuevos) === 0) {
    ?>
    <div class="container-fluid bg-info1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><span class="label label-warning"  id="qid">No hay nuevos registros.</span></h5>
                </div>
            </div>
        </div>
        <?php
    } else {
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
                    <?php foreach ($nuevos as $usuario) { ?>
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

                    <tfoot>
                        <tr>
                            <th colspan="5">
                                <form action method="POST">
                                    <button value="btnAceptar" type="submit" name="accion1">Aceptar a todos</button>
                                </form>
                            </th>
                        </tr>
                    </tfoot>


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
    }
    include_once 'plantillas/documento-cierre.inc.php';
    ?>

