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
    if ($_GET['id_tema'] == 0 || $_GET['id_tema'] == '-') { //HACER PARA TODOS LOS TEMAS, NO ORGANIZAR POR ASIGNATURAS
        $contador = RepositorioEstadisticas :: obtener_numero_fc_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
        $identificadores = RepositorioFlashcard :: obtener_todos_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
        $todos = RepositorioEstadisticas :: obtener_estadisticas_ultimas_respuestas_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $contador = RepositorioEstadisticas :: obtener_numero_fc(Conexion :: obtener_conexion(), $_GET['id_tema']);
        $identificadores = RepositorioFlashcard :: obtener_todos(Conexion :: obtener_conexion(), $_GET['id_tema']);
        $todos = RepositorioEstadisticas :: obtener_estadisticas_ultimas_respuestas_tema(Conexion :: obtener_conexion(), $_GET['id_tema']);
    }
}
if ($_GET['stats'] == 3) { //Respuestas por Flashcards
    if ($_GET['id_tema'] == 0 || $_GET['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_cantidad_respuestas_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
        $contador = RepositorioEstadisticas :: obtener_numero_fc_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
        $identificadores = RepositorioFlashcard :: obtener_todos_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_cantidad_respuestas_tema(Conexion :: obtener_conexion(), $_GET['id_tema']);
        $contador = RepositorioEstadisticas :: obtener_numero_fc(Conexion :: obtener_conexion(), $_GET['id_tema']);
        $identificadores = RepositorioFlashcard :: obtener_todos(Conexion :: obtener_conexion(), $_GET['id_tema']);
    }
}
if ($_GET['stats'] == 4) { //AVG de Score
    if ($_GET['id_tema'] == 0 || $_GET['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_avg_score_asignatura_DESC(Conexion :: obtener_conexion(), $_GET['asignatura']);
        $identificadores = RepositorioFlashcard :: obtener_todos_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
        $contador = RepositorioEstadisticas :: obtener_numero_fc_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_avg_score_tema_DESC(Conexion :: obtener_conexion(), $_GET['id_tema']);
        $identificadores = RepositorioFlashcard :: obtener_todos(Conexion :: obtener_conexion(), $_GET['id_tema']);
        $contador = RepositorioEstadisticas :: obtener_numero_fc(Conexion :: obtener_conexion(), $_GET['id_tema']);
    }
}
if ($_GET['stats'] == 5) { //Ultimos resultados %aciertos
    if ($_GET['id_tema'] == 0 || $_GET['id_tema'] == '-') {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_porcentaje_aciertos_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
        $contador = RepositorioEstadisticas :: obtener_numero_estudiantes_asignatura(Conexion :: obtener_conexion(), $_GET['asignatura']);
    } else {
        $todos = RepositorioEstadisticas :: obtener_estadisticas_porcentaje_aciertos(Conexion :: obtener_conexion(), $_GET['id_tema']);
        $contador = RepositorioEstadisticas :: obtener_numero_estudiantes(Conexion :: obtener_conexion(), $_GET['id_tema']);
    }
}
?>
