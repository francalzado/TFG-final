<?php
//
include_once './Control/control_estadisticas.inc.php';
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
                        <select class="seleccion" name="cosa" onchange="cambia()">
                            <option value="0">Seleccione
                                <?php
                                for ($i = 0; $i < (COUNT($mis_asignaturas)); $i++) {
                                    ?>
                                <option value="<?php echo $mis_asignaturas[$i][0] ?>"><?php echo $mis_asignaturas[$i][1] ?>
                                    <?php
                                }
                                ?>
                        </select>

                        <select class="seleccion" name="opt">
                            <option value="-">-
                        </select>

                        <select class="seleccion" name="tipo">
                            <option value="1">Todo
                            <option value="2">Ultimos Resultados por alumno 
                            <option value="3">Respuestas por Flashcards
                            <option value="4">AVG de Score de Flashcards 
                        </select>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-light">Consultar </button>

                    </form>
                </div>                
            </div>                
        </div>                

        <script type="text/javascript">
            //1) Definir Las Variables Correspondintes
            var opt_1 = new Array("-", "Tema 1 Redes", "Tema 2 Redes", "Tema 3 Redes");
            var opt_2 = new Array("-", "Tema 1 SSOO", "Tema 2 SSOO", "Tema 3 SSOO");
            var opt_3 = new Array("-", "Tema 1 EEDD", "Tema 2 EEDD", "Tema 3 EEDD", "Tema 4 EEDD", "Tema 5 EEDD");
//			var opt_4 = new Array ("-", "MSI", "ASUS", "GIGABYTE", "...");
            // 2) crear una funcion que permita ejecutar el cambio dinamico
            function cambia() {
                var cosa;
                //en option value poner el ID de la asignatura a seleccionar
                //Se toma el vamor de la "cosa seleccionada"
                cosa = document.formulario1.cosa[document.formulario1.cosa.selectedIndex].value;
                //se chequea si la "cosa" esta definida
                if (cosa !== 0) {
                    //selecionamos las cosas Correctas
                    mis_opts = eval("opt_" + cosa);
                    //se calcula el numero de cosas
                    num_opts = mis_opts.length;
                    //marco el numero de opt en el select
                    document.formulario1.opt.length = num_opts;
                    //para cada opt del array, la pongo en el select
                    for (i = 0; i < num_opts; i++) {
                        document.formulario1.opt.options[i].value = [i];
                        document.formulario1.opt.options[i].text = mis_opts[i];
                    }
                } else {
                    //si no habia ninguna opt seleccionada, elimino las cosas del select
                    document.formulario1.opt.length = 1;
                    //ponemos un guion en la unica opt que he dejado
                    document.formulario1.opt.options[0].value = "-";
                    document.formulario1.opt.options[0].text = "-";
                }
                //hacer un reset de las opts
                document.formulario1.opt.options[0].selected = true;
            }
        </script>
    </body>

</html>