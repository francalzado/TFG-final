<?php
include_once 'app/RepositorioEstadisticas.inc.php';
include_once 'app/Conexion.inc.php';

Conexion :: abrir_conexion();
if(isset($_REQUEST['id_asignatura'])){
    $json_temas = RepositorioEstadisticas::obtener_temas_por_asignatura(Conexion :: obtener_conexion(),$_REQUEST['id_asignatura']);
    $response = '
    <select class="seleccion" name="opt" id="opt">
        <option value="-">Todos los temas';
            if (!empty($json_temas)) {
                for ($i = 0; $i < (COUNT($json_temas)); $i++) {
                    $response.= '<option value="'.$json_temas[$i][1].'">'.$json_temas[$i][2];
                }
            }
    $response.='</select>';
}

echo $response;
?>