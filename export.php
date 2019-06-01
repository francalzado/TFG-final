<?php

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioEstadisticas.inc.php';
Conexion :: abrir_conexion();
//export.php  
if (isset($_POST["export"]) && $_POST['stats'] == 1) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('nombre', 'apellidos', 'email', 'id_fc', 'pregunta', 'respuesta', 'score', 'fecha'), ';');
    if ($_POST['id_tema'] == 0 || $_POST['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_tema(Conexion :: obtener_conexion(), $_POST['id_tema']);
    }
    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['nombre'], $stats['apellidos'], $stats['email'], $stats['id_fc'], $stats['pregunta'], $stats['respuesta'], $stats['score'], $stats['fecha']), ';');
    }
    fclose($output);
}
if (isset($_POST["export"]) && $_POST['stats'] == 2) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('id_usuario', 'nombre', 'apellidos', 'email', 'id_fc', 'respuesta', 'score', 'fecha'), ';');
        if ($_POST['id_tema'] == 0 || $_POST['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_ultimas_respuestas_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_ultimas_respuestas_tema(Conexion :: obtener_conexion(), $_POST['id_tema']);
    }
    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['id_usuario'], $stats['nombre'],$stats['apellidos'], $stats['email'], $stats['id_fc'], $stats['respuesta'], $stats['score'], $stats['fecha']), ';');
    }
    fclose($output);
}
if (isset($_POST["export"]) && $_POST['stats'] == 3) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('id_fc', 'pregunta', 'respuesta', 'total respuestas', 'respuesta correcta'), ';');
    if ($_POST['id_tema'] == 0 || $_POST['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_cantidad_respuestas_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_cantidad_respuestas_tema(Conexion :: obtener_conexion(), $_POST['id_tema']);
    }    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['id_fc'], $stats['pregunta'], $stats['respuesta'], $stats['TotalRespuestas'], $stats['RespuestaCorrecta']), ';');
    }
    fclose($output);
}
if (isset($_POST["export"]) && $_POST['stats'] == 4) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('id_fc', 'pregunta', 'score medio'), ';');
    if ($_POST['id_tema'] == 0 || $_POST['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_avg_score_asignatura_DESC(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_avg_score_tema_DESC(Conexion :: obtener_conexion(), $_POST['id_tema']);
    }    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['id_fc'], $stats['pregunta'], $stats['AVG(score)']), ';');
    }
    fclose($output);
}
if (isset($_POST["export"]) && $_POST['stats'] == 5) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('id_usuario','nombre', 'apellidos', 'email', 'porcentaje', 'fecha'), ';');
    if ($_POST['id_tema'] == 0 || $_POST['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_porcentaje_aciertos_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_porcentaje_aciertos(Conexion :: obtener_conexion(), $_POST['id_tema']);
    }    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['id_usuario'],$stats['nombre'], $stats['apellidos'], $stats['email'], $stats['porcentaje'],$stats['fecha']), ';');
    }
    fclose($output);
}
?>  
