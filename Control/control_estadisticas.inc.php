<?php
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
include_once 'app/Conexion.inc.php';
Conexion :: abrir_conexion();
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$todas = RepositorioFlashcard::estadisticas($conexion,$_SESSION['id_usuario'],$_SESSION['id_tema']);
?>
