<?php
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';
Conexion :: abrir_conexion();
$txtstats = (isset($_POST['tipo'])) ? $_POST['tipo'] : "";
$txttema = (isset($_POST['opt'])) ? $_POST['opt'] : "";
$txtasignatura = (isset($_POST['cosa'])) ? $_POST['cosa'] : "";


$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
if($_POST){
          Redireccion :: redirigir(RUTA_ESTADISTICAS_0. '?asignatura=' . $txtasignatura. '&id_tema=' . $txttema. '&stats=' . $txtstats);  
}
echo $txtasignatura;
echo $txttema;
echo $txtstats;

//
//if ($accion_recurso) {
//    try {
////REDIRECCIONAMIENTO A LOS RECURSOS DE CADA TEMA
//        Redireccion :: redirigir(RUTA_RECURSOS . '?id_tema=' . $txtId_tema);
//    } catch (PDOException $ex) {
//        print 'Error' . $ex->getMessage();
//    }
//} else if ($accion_flashcard) {
//    try {
////REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
//        Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $txtId_tema);
//    } catch (PDOException $ex) {
//        print 'Error' . $ex->getMessage();
//    }
//} else if ($accion_add_recurso) {
//    try {
////REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
//        Redireccion :: redirigir(RUTA_NUEVO_RECURSO . '?id_tema=' . $txtId_tema);
//    } catch (PDOException $ex) {
//        print 'Error' . $ex->getMessage();
//    }
//} else if ($accion_add_flashcard) {
//    try {
////REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
//        Redireccion :: redirigir(RUTA_NUEVA_FLASHCARD . '?id_tema=' . $txtId_tema);
//    } catch (PDOException $ex) {
//        print 'Error' . $ex->getMessage();
//    }
//} else if ($accion_estadisticas) {
//    try {
////REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
//        Redireccion :: redirigir(RUTA_ESTADISTICAS . '?id_tema=' . $txtId_tema);
//    } catch (PDOException $ex) {
//        print 'Error' . $ex->getMessage();
//    }
//} else if ($accion_tema) {
//    try {
////REDIRECCIONAMIENTO A LAS FLASHCARDS DE CADA TEMA
//        Redireccion :: redirigir(RUTA_NUEVO_TEMA . '?id_asignatura=' . $id_asignatura);
//    } catch (PDOException $ex) {
//        print 'Error' . $ex->getMessage();
//    }
//}

?>
