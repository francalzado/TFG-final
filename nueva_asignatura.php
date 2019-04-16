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
    $asignatura = new Asignatura('', $_POST['nombre'], $_POST['curso'],$_POST['cuatrimestre']);
    $recurso_insertado = RepositorioAsignatura :: insertar_asignatura(Conexion :: obtener_conexion(),$asignatura);
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


<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card mt-4 text-center">
            <div class="card-header">
                <h1 class="h4">
                    Registrar Nueva Asignatura
                </h1>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                    <?php
                    if (isset($_POST['enviar'])) {
                        
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Asignatura" autofocus>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-10">
                        <select id="cuatrimestreselector" name="cuatrimestre" class="form-control">
                            <option value="1" selected="selected">Primer Cuatrimestre</option>
                            <option value="2">Segundo Cuatrimestre </option>
                            </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <select id="cursoselector" name="curso" class="form-control">
                            <option value="1" >Primer Curso</option>
                            <option value="2" >Segundo Curso</option>
                            <option value="3" >Tercer Curso</option>
                            <option value="4" >Cuarto Curso</option>
                            </select>
                    </div>
                </div>
                    <button type="submit"class="btn btn-primary btn-block" name="enviar">
                        Registrar 
                    </button>
                </form>
                <!-- Select Basic -->
                
            </div>
        </div>

    </div>
</div>