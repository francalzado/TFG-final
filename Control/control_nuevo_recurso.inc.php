<?php
include_once 'app/config.inc.php';
include_once 'app/ValidadorFlashCard.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Recurso.inc.php';
include_once 'app/RepositorioRecurso.inc.php';
$id_tema = (isset($_GET['id_tema'])) ? $_GET['id_tema'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$txtId_tema = (isset($_POST['txtId_tema'])) ? $_POST['txtId_tema'] : "";
$txtEnlace = (isset($_POST['txtEnlace'])) ? $_POST['txtEnlace'] : "enlace";
$txtTitulo = (isset($_POST['txtTitulo'])) ? $_POST['txtTitulo'] : "titulo";
$titulo = 'Nuevo Recurso';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '1')) {
    Redireccion :: redirigir(RUTA_INDEX);
}

if (isset($_POST['guardar'])) {
    Conexion :: abrir_conexion();
    //$validador = new ValidadorRegistro($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], Conexion:: obtener_conexion());
    //if($validador -> registro_valido()){
    $recurso = new Recurso('', $_POST['txtId_tema'], $_POST['enlace'], $_POST['titulo']);
    $recurso_insertado = RepositorioRecurso :: insertar_recurso(Conexion :: obtener_conexion(), $recurso);
    if ($recurso_insertado) {?>
        <div class ='alert alert-success' role = 'alert'>
            Recurso añadido con éxito
        </div>
<?php }
    Conexion :: cerrar_conexion();
}

?>

