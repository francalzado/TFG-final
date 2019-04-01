<?php

include_once 'Flashcard.inc.php';

class RepositorioFlashcard {

    public static function insertar_flashcard($conexion, $flashcard) {
        $flascard_insertada = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO flashcard(id_tema,pregunta,r1,r2,r3,r4,cuerpo,val) VALUES(:id_tema, :pregunta, :r1, :r2,:r3,:r4,:cuerpo,:val) ";
                $idtemaTemp = $flashcard->obtenerIdTema();
                $preguntatemp = $flashcard->obtenerPregunta();
                $r1temp = $flashcard->obtenerR1();
                $r2temp = $flashcard->obtenerR2();
                $r3temp = $flashcard->obtenerR3();
                $r4temp = $flashcard->obtenerR4();
                $cuerpotemp = $flashcard->obtenerCuerpo();
                $valtemp = $flashcard->obtenerVal();

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $idtemaTemp, PDO::PARAM_STR);                
                $sentencia->bindParam(':pregunta', $preguntatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':r1', $r1temp, PDO::PARAM_STR);
                $sentencia->bindParam(':r2', $r2temp, PDO::PARAM_STR);
                $sentencia->bindParam(':r3', $r3temp, PDO::PARAM_STR);
                $sentencia->bindParam(':r4', $r4temp, PDO::PARAM_STR);
                $sentencia->bindParam(':cuerpo', $cuerpotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':val', $valtemp, PDO::PARAM_STR);
                $flascard_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $flascard_insertada;
    }

    public static function obtener_todos($conexion,$id_tema) {
        $usuarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM flashcard WHERE id_tema= :id_tema";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_tema, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();


            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

        public static function estadisticas($conexion,$id_tema) {
        $usuarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM usuarioflashcard WHERE id_usuario = 4";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_tema, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();


            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }
}

?>
