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
        $todos = RepositorioEstadisticas :: obtener_estadisticas_asignatura(Conexion :: obtener_conexion(), $_POST['id_tema']);
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
    fputcsv($output, array('nombre', 'apellidos', 'email', 'id_fc', 'pregunta', 'respuesta', 'score', 'fecha'), ';');
    $todos = RepositorioEstadisticas :: obtener_estadisticas_asignatura(Conexion :: obtener_conexion(), 1);
    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['nombre'], $stats['apellidos'], $stats['email'], $stats['id_fc'], $stats['pregunta'], $stats['respuesta'], $stats['score'], $stats['fecha']), ';');
    }
    fclose($output);
}
if (isset($_POST["export"]) && $_POST['stats'] == 3) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('nombre', 'apellidos', 'email', 'id_fc', 'pregunta', 'respuesta', 'score', 'fecha'), ';');
    $todos = RepositorioEstadisticas :: obtener_estadisticas_asignatura(Conexion :: obtener_conexion(), 1);
    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['nombre'], $stats['apellidos'], $stats['email'], $stats['id_fc'], $stats['pregunta'], $stats['respuesta'], $stats['score'], $stats['fecha']), ';');
    }
    fclose($output);
}
if (isset($_POST["export"]) && $_POST['stats'] == 4) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('nombre', 'apellidos', 'email', 'id_fc', 'pregunta', 'respuesta', 'score', 'fecha'), ';');
    $todos = RepositorioEstadisticas :: obtener_estadisticas_asignatura(Conexion :: obtener_conexion(), 1);
    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['nombre'], $stats['apellidos'], $stats['email'], $stats['id_fc'], $stats['pregunta'], $stats['respuesta'], $stats['score'], $stats['fecha']), ';');
    }
    fclose($output);
}
if (isset($_POST["export"]) && $_POST['stats'] == 5) {
    $conexion = Conexion :: obtener_conexion();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('nombre', 'apellidos', 'email', 'id_fc', 'pregunta', 'respuesta', 'score', 'fecha'), ';');
    $todos = RepositorioEstadisticas :: obtener_estadisticas_asignatura(Conexion :: obtener_conexion(), 1);
    //fputcsv($output, $row);
    foreach ($todos as $stats) {
        fputcsv($output, array($stats['nombre'], $stats['apellidos'], $stats['email'], $stats['id_fc'], $stats['pregunta'], $stats['respuesta'], $stats['score'], $stats['fecha']), ';');
    }
    fclose($output);
}
?>  
