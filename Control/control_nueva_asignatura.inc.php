<?php

include_once 'app/config.inc.php';
include_once 'app/ValidadorFlashCard.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Recurso.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';
$id_asignatura = (isset($_GET['id_asignatura'])) ? $_GET['id_asignatura'] : "";
$id_tema = (isset($_GET['id_tema'])) ? $_GET['id_tema'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$txtId_asignatura = (isset($_POST['txtId_asignatura'])) ? $_POST['txtId_asignatura'] : "";
$txtEnlace = (isset($_POST['txtEnlace'])) ? $_POST['txtEnlace'] : "enlace";

if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '1')) {
    Redireccion :: redirigir(RUTA_INDEX);
}

if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();       // nombre, curso, cuatrimestre
    $asignatura = new Asignatura('', $_POST['nombre'], $_POST['curso'], $_POST['cuatrimestre']);
    $recurso_insertado = RepositorioAsignatura :: insertar_asignatura(Conexion :: obtener_conexion(), $asignatura);
    if ($recurso_insertado) {
        Redireccion :: redirigir(RUTA_ASIGNATURAS);
    } else {
        echo "No insertada";
        //Redireccion :: redirigir(RUTA_REGISTRO);
    }

    Conexion :: cerrar_conexion();
//}
}
$titulo = 'Nuevo Tema';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
?>

