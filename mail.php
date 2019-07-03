<?php
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$email= (isset($_POST['email'])) ? $_POST['email'] : "";
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : "";
$txtarea = (isset($_POST['txtarea'])) ? $_POST['txtarea'] : "";
$titulo = 'Nuevo Recurso';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';

$para      = 'nobody@example.com';
$titulo    = 'El título';
$mensaje   = 'Hola';
$cabeceras = "From: ".$email. "\r\n" .
    "Reply-To: ". $email. "\r\n" .
    "Content-type: text/html\r\n";

if($rol == 3){ //desarrollador
mail('fcalzado@ujaen.es', $titulo, $mensaje, $cabeceras);
}else if($rol == 2){ //administrador
   mail('fcharte@ujaen.es', $titulo, $mensaje, $cabeceras);
 
}



?>