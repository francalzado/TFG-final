<?php

include_once 'Usuario.inc.php';

class RepositorioUsuario {

    public static function obtener_todos($conexion) {
        $usuarios = array();

        if (isset($conexion)) {

            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();


            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function obtener_nuevos($conexion) {
        $usuarios = array();

        if (isset($conexion)) {

            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios WHERE rol = 0";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();


            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function obtener_numero_usuarios($conexion) {

        $total_usuarios = null;

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT COUNT(*) as total FROM usuarios";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_usuarios = $resultado['total'];
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $total_usuarios;
    }

    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios(nombre,apellidos,email,password,rol) VALUES(:nombre, :apellidos, :email, :password,0) ";
                $nombretemp = $usuario->obtenerNombre();
                $apellidostemp = $usuario->obtenerApellidos();
                $emailtemp = $usuario->obtenerEmail();
                $passwordtemp = $usuario->obtenerPassword();

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia->bindParam(':apellidos', $apellidostemp, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $emailtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':password', $passwordtemp, PDO::PARAM_STR);
                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }

    public static function email_existe($conexion, $email) {
        $email_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE email = :email";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $email_existe = true;
                } else {
                    $email_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $email_existe;
    }

    public static function obtener_usuario_por_email($conexion, $email) {
        $usuario = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE email = :email";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id_usuario'], $resultado['nombre'], $resultado['apellidos'], $resultado['email'], $resultado['password'], $resultado['rol']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario;
    }

//    
//    public static function modificar_usuario($conexion,$id_usuario){
//        $usuario_modificado = false;
//        try{
//                $sql = "UPDATE usuarios SET
//                id_usuario = :Id_usuario,
//                nombre = :Nombre,
//                apellidos = :Apellidos,
//                email = :Email,
//                rol = :Rol 
//                WHERE id_usuario = :Id_usuario)";
//                $sentencia = $conexion->prepare($sql);
//                $sentencia->bindParam(':Id_usuario', $txtId_usuario);
//                $sentencia->bindParam(':Nombre', $txtNombre);
//                $sentencia->bindParam(':Apellidos', $txtApellidos);
//                $sentencia->bindParam(':Email', $txtEmail);
//                $sentencia->bindParam(':Rol', $txtRol);
//                $usuario_modificado = $sentencia->execute();
//
//                }
//                catch(PDOException $ex){
//                        print 'Error' . $ex ->getMessage();
//                }
//        return $usuario_modificado;
//    }
}

?>