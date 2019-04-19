<?php

include_once 'app/config.inc.php';
include_once 'app/ValidadorFlashCard.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Flashcard.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';

if (!ControlSesion::sesion_iniciada() || (ControlSesion::getRol() == '1')) {
    Redireccion :: redirigir(RUTA_INDEX);
}

$txtId_tema = (isset($_GET['id_tema'])) ? $_GET['id_tema'] : "";
if (isset($_POST['guardar'])) {
    Conexion :: abrir_conexion();
    //$validador = new ValidadorRegistro($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], Conexion:: obtener_conexion());
    //if($validador -> registro_valido()){

    $flashcard = new Flashcard('', $txtId_tema, $_POST['pregunta'], $_POST['r1'], $_POST['r2'], $_POST['r3'], $_POST['r4'], $_POST['cuerpo'], $_POST['val']);

    $flashcard_insertada = RepositorioFlashcard :: insertar_flashcard(Conexion :: obtener_conexion(), $flashcard);
    if ($flashcard_insertada) {
        Redireccion :: redirigir(RUTA_NUEVA_FLASHCARD . '?id_tema=' . $txtId_tema);
    } else {
        echo "No insertada";
        Redireccion :: redirigir(RUTA_NUEVA_FLASHCARD . '?id_tema=' . $txtId_tema);
    }

    Conexion :: cerrar_conexion();
//}
}
$titulo = 'Flashcard';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
?>

