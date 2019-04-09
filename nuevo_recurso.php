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

if (ControlSesion::sesion_iniciada() && (ControlSesion::getRol() == '1')) {
    Redireccion :: redirigir(RUTA_INDEX);
}

if (isset($_POST['guardar'])) {
    Conexion :: abrir_conexion();
    //$validador = new ValidadorRegistro($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], Conexion:: obtener_conexion());
    //if($validador -> registro_valido()){
    $recurso = new Recurso('', $_POST['txtId_tema'], $_POST['enlace']);
    $recurso_insertado = RepositorioRecurso :: insertar_recurso(Conexion :: obtener_conexion(), $recurso);
    if ($recurso_insertado) {
        Redireccion :: redirigir(RUTA_INDEX);
    } else {
        echo "No insertada";
        //Redireccion :: redirigir(RUTA_REGISTRO);
    }

    Conexion :: cerrar_conexion();
//}
}
$titulo = 'Nuevo Recurso';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Aplicacion Web de Fran</title>
        <!-- BOOSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- MI PROPIO CSS MAIN -->
        <link rel="stylesheet" href="/css/main.css">

    </head>
    <div class="row"></div>
    <div class="col-md-4 mx-auto">
        <div class="card mt-4 text-center">
            <div class="card-header">
                <h1 class="h4">
                    Nuevo Recurso
                </h1>
            </div>
            <div class="card-body">

                <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                    <div class="form-group">
                        <input type="text" name="enlace" class="form-control" placeholder="Enlace" autofocus/>
                        <input type="hidden" name="txtId_tema" value="<?php echo $id_tema; ?>">

                    </div>

                    <div class="form-group">
                        <button type="submit"class="btn btn-primary btn-block" name="guardar">
                            Guardar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</html>


