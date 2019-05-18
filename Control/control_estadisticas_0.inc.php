<?php

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioEstadisticas.inc.php';
Conexion :: abrir_conexion();
if ($_GET['stats'] == 1) { //TODO
    if ($_GET['id_tema'] == 0 || $_GET['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_tema(Conexion :: obtener_conexion(), $_GET['id_tema']);
    }
}
if ($_GET['stats'] == 2) { //Ultimos Resultados por Alumno
    $todos = RepositorioEstadisticas :: obtener_estadisticas_ultimas_respuestas_tema(Conexion :: obtener_conexion(), $_GET['id_tema']);
}
if ($_GET['stats'] == 3) { //Respuestas por Flashcards
    $todos = RepositorioEstadisticas :: obtener_estadisticas_cantidad_respuestas_tema(Conexion :: obtener_conexion(), $_GET['id_tema']);
    $contador = RepositorioEstadisticas :: obtener_numero_fc(Conexion :: obtener_conexion(), $_GET['id_tema']);
}
if ($_GET['stats'] == 4) { //AVG de Score
    $todos = RepositorioEstadisticas :: obtener_estadisticas_avg_score_tema_DESC(Conexion :: obtener_conexion(), $_GET['id_tema']);
}
?>
