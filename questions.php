<?php
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioFlashcard.inc.php';
include_once 'app/RepositorioAsignaturas.inc.php';
include_once 'app/RepositorioEstadisticas.inc.php';
$mis_asignaturas = RepositorioAsignatura :: obtener_mis_asignaturas(Conexion :: obtener_conexion(), $_SESSION['id_usuario']);
$temas = RepositorioEstadisticas:: obtener_temas(Conexion :: obtener_conexion());
if($_POST){
          Redireccion :: redirigir(RUTA_ESTADISTICAS_0. '?asignatura=' . $txtasignatura. '&id_tema=' . $txttema. '&stats=' . $txtstats);  
}

?>


<?php
if(isset($_GET['p'])){
    switch($_GET['sel']){
        case '1':
            $ret=array('Final del Juego','Rayuela','El Señor de loas Anillos');
            break;
        case '2':
            $ret=array('rock','new age');
            break;
        case '3':
            $ret=array('español','php','javascript');
            break;
        default:
            echo 'document.getElementById("pp").innerHTML="<select name=\"dos\" id=\"dos\"></select>";';
            exit;
    }
$html='<select name=\"dos\" id=\"dos\">';
foreach($ret as $v)
    $html.='<option value=\"'.$v.'\">'.$v.'</option>';
$html.='</select>';
echo 'document.getElementById("pp").innerHTML="'.$html.'";';
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>test</title>
<script>
function adjs(url){
    oldsc=document.getElementById("old_sc");
       if(oldsc)
            document.getElementsByTagName('body')[0].removeChild(oldsc);
    sc=document.createElement('script');
    sc.id="old_sc";
    sc.src=url+'&'+Math.random();
    document.getElementsByTagName('body')[0].appendChild(sc);
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
      <select name="uno" id="uno" onchange="adjs('?p&sel='+this.value)">
      <option value="0">seleccionar</option>
      <option value="1">libros</option>
    <option value="2">música</option>
    <option value="3">lenguaje</option>
  </select>
  <div id="pp"><select name="dos" id="dos">
  </select></div>
</form>
</body>
</html> 