
<?php
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';
include_once 'app/RepositorioEstadisticas.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion :: abrir_conexion();
$conexion = Conexion :: obtener_conexion();
$txtstats = (isset($_POST['tipo'])) ? $_POST['tipo'] : "";
$txttema = (isset($_POST['opt'])) ? $_POST['opt'] : "";
$txtasignatura = (isset($_POST['cosa'])) ? $_POST['cosa'] : "";
$mis_asignaturas = RepositorioAsignatura :: obtener_mis_asignaturas(Conexion :: obtener_conexion(), $_SESSION['id_usuario']);
$temas = RepositorioEstadisticas:: obtener_temas(Conexion :: obtener_conexion());


Conexion :: cerrar_conexion();
if($_POST){
          Redireccion :: redirigir(RUTA_ESTADISTICAS_0. '?asignatura=' . $txtasignatura. '&id_tema=' . $txttema. '&stats=' . $txtstats);  
}
echo $txtasignatura;
echo $txttema;
echo $txtstats;

?>
