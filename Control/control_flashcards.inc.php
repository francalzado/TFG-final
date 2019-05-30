<?php

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
$todos = RepositorioFlashcard :: obtener_todos(Conexion :: obtener_conexion(), $_GET['id_tema']);
$conexion = Conexion :: obtener_conexion();
Conexion :: cerrar_conexion();
$titulo = 'Inicio';
$txtId_fc = (isset($_POST['txtId_fc'])) ? $_POST['txtId_fc'] : "";
$txtId_tema = (isset($_POST['txtId_tema'])) ? $_POST['txtId_tema'] : "";
$txtPregunta = (isset($_POST['txtPregunta'])) ? $_POST['txtPregunta'] : "";
$txtEmail = (isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : "";
$txtR1 = (isset($_POST['txtR1'])) ? $_POST['txtR1'] : "";
$txtR2 = (isset($_POST['txtR2'])) ? $_POST['txtR2'] : "";
$txtR3 = (isset($_POST['txtR3'])) ? $_POST['txtR3'] : "";
$txtR4 = (isset($_POST['txtR4'])) ? $_POST['txtR4'] : "";
$txtCuerpo = (isset($_POST['txtCuerpo'])) ? $_POST['txtCuerpo'] : "";
$txtVal = (isset($_POST['txtVal'])) ? $_POST['txtVal'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$accion1 = (isset($_POST['accion1'])) ? $_POST['accion1'] : "";
$siguiente = null;
include_once 'plantillas/documento-declaracion.inc.php';

if (ControlSesion::sesion_iniciada() && ((ControlSesion::getRol() == '2') || (ControlSesion::getRol() == '3'))) {
    include_once 'plantillas/navbar-inicio.inc.php';

    switch ($accion1) {
        case "btnModificar":
            $usuario_modificado = false;
            try {
                $sql = "UPDATE flashcard SET
                pregunta = :Pregunta,
                r1 = :R1,
                r2 = :R2,
                r3 = :R3,
                r4 = :R4,
                cuerpo = :Cuerpo,
                val = :Val 
                WHERE id_fc = :Id_fc";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':Id_fc', $txtId_fc);
                $sentencia->bindParam(':Pregunta', $txtPregunta);
                $sentencia->bindParam(':R1', $txtR1);
                $sentencia->bindParam(':R2', $txtR2);
                $sentencia->bindParam(':R3', $txtR3);
                $sentencia->bindParam(':R4', $txtR4);
                $sentencia->bindParam(':Cuerpo', $txtCuerpo);
                $sentencia->bindParam(':Val', $txtVal);
                $usuario_modificado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
            if ($usuario_modificado) {
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $_GET['id_tema']);
            }
            if (!$usuario_modificado)
            Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $_GET['id_tema']);

            break;
        case "btnEliminar":
            //SI NO BORRA ES PORQUE ES CLAVE PRINCIPAL EN ALGUN SITIO
            $usuario_borrado = false;
            try {
                $sql = "DELETE from flashcard WHERE id_fc = :Id_fc";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':Id_fc', $txtId_fc);
                $usuario_borrado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
            if ($usuario_borrado) {
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $_GET['id_tema']);
            }
            if (!$usuario_borrado)
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $_GET['id_tema']);


            break;
        case "btnAdd":
            $usuario_Add = false;
            try {
                $sql = "INSERT INTO flashcard(id_tema,pregunta,r1,r2,r3,r4,cuerpo,val) VALUES(:id_tema, :pregunta, :r1, :r2,:r3,:r4,:cuerpo,:val) ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_tema', $_GET['id_tema']);
                $sentencia->bindParam(':pregunta', $txtPregunta);
                $sentencia->bindParam(':r1', $txtR1);
                $sentencia->bindParam(':r2', $txtR2);
                $sentencia->bindParam(':r3', $txtR3);
                $sentencia->bindParam(':r4', $txtR4);
                $sentencia->bindParam(':cuerpo', $txtCuerpo);
                $sentencia->bindParam(':val', $txtVal);
                $flascard_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
            if ($usuario_Add) {
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $_GET['id_tema']);
            }
            if (!$usuario_Add)
                Redireccion :: redirigir(RUTA_FLASHCARDS . '?id_tema=' . $_GET['id_tema']);


            break;
    }
}
?>