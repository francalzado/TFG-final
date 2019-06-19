<?php

include_once 'Recurso.inc.php';
class RepositorioRecurso {

    public static function insertar_recurso($conexion,$recurso) {
        $recurso_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO recurso(id_tema,enlace,titulo) VALUES(:id_tema, :enlace, :titulo) ";
                $enlacetemp = $recurso ->obtenerEnlace();
                $titulotemp = $recurso ->obtenerTitulo();
                $id_RecursosTEMP= $recurso ->obtenerIdTema();
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_RecursosTEMP, PDO::PARAM_STR);
                $sentencia->bindParam(':enlace', $enlacetemp, PDO::PARAM_STR);                
                $sentencia->bindParam(':titulo', $titulotemp, PDO::PARAM_STR);                
                $recurso_insertado = $sentencia->execute();
                //$nuevo_log = log :: nuevo_log($conexion,$sql,$_SESSION['id_usuario']);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $recurso_insertado;
    }

}
 
?>
