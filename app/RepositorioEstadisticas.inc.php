<?php

include_once 'Asignatura.inc.php';
include_once 'Tema.inc.php';
include_once 'Recurso.inc.php';

class RepositorioEstadisticas {

    //Obtener todas las estadisticas de una asignatura
    public static function obtener_estadisticas_asignatura($conexion, $id_asignatura) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT u.nombre, u.apellidos, u.email, a.id_fc,f.pregunta, a.respuesta, a.score, a.fecha
FROM usuarioflashcard a, usuarios u,flashcard f
WHERE u.id_usuario = a.id_usuario
AND a.id_fc = f.id_fc AND a.id_fc IN
( SELECT id_fc FROM flashcard WHERE id_tema IN ( SELECT id_tema FROM temas WHERE id_asignatura = :id_asignatura))
ORDER BY id_fc, fecha DESC";
                $id_asignaturaTEMP = $id_asignatura;
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_asignatura', $id_asignaturaTEMP, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    //Obtener todas las estadisticas de 1 tema concreto
    public static function obtener_estadisticas_tema($conexion, $id_tema) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT u.nombre, u.apellidos, u.email, a.id_fc,f.pregunta, a.respuesta,a.score,a.fecha 
                    FROM usuarioflashcard a,usuarios u, flashcard f
                    WHERE u.id_usuario = a.id_usuario 
                    AND a.id_fc = f.id_fc AND a.id_fc IN  
                    ( SELECT id_fc FROM flashcard WHERE id_tema = :id_tema)
                    ORDER BY id_fc, fecha DESC";
                $id_temaTEMP = $id_tema;
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_temaTEMP, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    //Numero de veces que se ha contestado cada opcion en cada flashcard
    public static function obtener_estadisticas_cantidad_respuestas_tema($conexion, $id_tema) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT  usuarioflashcard.id_fc,flashcard.pregunta, respuesta, 
       Count(respuesta+1) AS TotalRespuestas,
       val AS RespuestaCorrecta
FROM usuarioflashcard, flashcard
WHERE usuarioflashcard.id_fc = flashcard.id_fc
AND usuarioflashcard.id_fc IN (SELECT id_fc FROM flashcard WHERE id_tema =:id_tema)
GROUP BY id_fc,respuesta
ORDER BY id_fc";
                $id_temaTEMP = $id_tema;
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_temaTEMP, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    //Ultimas respuestas por flashcard por estudiante
    public static function obtener_estadisticas_ultimas_respuestas_tema($conexion, $id_tema) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT
    u.id_usuario,u.nombre,u.apellidos,u.email, MAX(fecha) AS fecha, id_fc,respuesta,score
FROM 
    usuarioflashcard, usuarios u
WHERE u.id_usuario = usuarioflashcard.id_usuario 
AND usuarioflashcard.id_fc IN ( SELECT id_fc FROM flashcard WHERE id_tema = :id_tema)
GROUP BY id_fc,u.id_usuario
ORDER BY id_usuario,fecha ASC";
                $id_temaTEMP = $id_tema;
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_temaTEMP, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    //AVG de las flashcards con mejor score a peor
    public static function obtener_estadisticas_avg_score_tema_DESC($conexion, $id_tema) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT uf.id_fc,f.pregunta, AVG(score) FROM usuarioflashcard uf,flashcard f
WHERE uf.id_fc = f.id_fc AND uf.id_fc IN (SELECT id_fc FROM flashcard WHERE id_tema=:id_tema)
GROUP BY id_fc
ORDER BY AVG(score) DESC";
                $id_temaTEMP = $id_tema;
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_temaTEMP, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    //Numero de veces que se ha contestado cada opcion en cada flashcard
    public static function obtener_numero_fc($conexion, $id_tema) {
        if (isset($conexion)) {
            try {
                $sql = " SELECT COUNT(id_fc) AS contador FROM flashcard WHERE id_tema = :id_tema";
                $id_temaTEMP = $id_tema;
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $id_temaTEMP, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function obtener_temas($conexion) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT temas.id_asignatura,temas.id_tema,temas.titulo FROM temas
ORDER BY id_asignatura";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
            } catch (Exception $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $resultado;
    }

}
