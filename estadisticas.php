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
if ($_POST) {
    Redireccion :: redirigir(RUTA_ESTADISTICAS_0 . '?asignatura=' . $txtasignatura . '&id_tema=' . $txttema . '&stats=' . $txtstats);
}
echo $txtasignatura;
echo $txttema;
echo $txtstats;
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <title>Select Dinamico</title>
        <style type="text/css">
            .seleccion{
                border: 3px solid #fffff;
                background-color:#fffff;
                color:black;
                font-size:17px;
                width:200px;
                height:35px;
            }
        </style>
    </head>
    <body>
        <br>
        <div class="col-md-6 mx-auto">
            <div class="card mt-6 text-center">
                <div class="card-header">
                    <form name="formulario1" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <div class="col-md-4">
                            <select class="seleccion" name="cosa" onchange="cambia(this.value)">
                                <option value="0">Seleccione
                                    <?php
                                    for ($i = 0; $i < (COUNT($mis_asignaturas)); $i++) {
                                        ?>
                                    <option value="<?php echo $mis_asignaturas[$i][0] ?>"><?php echo $mis_asignaturas[$i][1] ?>
                                        <?php
                                    }
                                    ?>
                            </select>
                        </div>
                        
                        <div id="txtHint" class="col-md-4"><b>Person info will be listed here...</b></div>
                        <div class="col-md-4">
                            <select class="seleccion" name="tipo">
                                <option value="1">Todo
                                <option value="2">Ultimos Resultados por alumno 
                                <option value="3">Respuestas por Flashcards
                                <option value="4">AVG de Score de Flashcards 
                            </select>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-light">Consultar </button>

                    </form>
                </div>                
            </div>                
        </div>     

        

        <script type="text/javascript">
            function cambia(str) {

                var datos = {
                    "id_asignatura": str,
                };

                $.ajax({
                    type: 'POST',
                    url: 'consulta.php',
                    data: datos,
                    dataType: 'text',
                    success: function (d) {
                        $("#txtHint").html(d);
                        document.getElementById('txtHint').innerHTML = (d);
                    }

                });
                return false;
            }
            //Estas enviando a tu propia pagina
            //ergo tu carga es el html de estadisticas


            //  QUE TIENES QUE HACER?
            // Enviar a carga_datos.php
            // echo response
            // estadisticas
        </script>
    </body>

</html>