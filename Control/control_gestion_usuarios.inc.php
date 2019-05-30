<?php

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$todos = RepositorioUsuario :: obtener_todos(Conexion :: obtener_conexion());
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
            //print 'Se ha modificado correctamente';
            Redireccion :: redirigir(RUTA_GESTION_USUARIOS);
        }
        if (!$usuario_modificado)
            print 'No se ha modificado correctaente';
        //Redireccion :: redirigir(RUTA_GESTION_USUARIOS);

        break;
    case "btnEliminar":
        $usuario_borrado = false;
        try {
            //DELETE MAS COMPLEJO YA QUE HAY QUE BORRAR TODO LO RELACIONADO CON EL ( ES FOREIGN KEY DE VARIAS COSAS) 
            //FUNCIONA SI SU ID NO ES CLAVE DE OTRAS TABLAS!!!!!
            $sql01 = "DELETE from usuarioflashcard WHERE id_usuario = :Id_usuario";
            $sentencia = $conexion->prepare($sql01);
            $sentencia->bindParam(':Id_usuario', $txtId_usuario);
            $usuario_borrado = $sentencia->execute();

            $sql02 = "DELETE from usuarioasignatura WHERE id_usuario = :Id_usuario";
            $sentencia = $conexion->prepare($sql02);
            $sentencia->bindParam(':Id_usuario', $txtId_usuario);
            $usuario_borrado = $sentencia->execute();

            $sql03 = "DELETE from usuarios
                WHERE id_usuario = :Id_usuario";
            $sentencia = $conexion->prepare($sql03);
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

