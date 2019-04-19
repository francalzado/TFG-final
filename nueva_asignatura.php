<?php
include_once './Control/control_nueva_asignatura.inc.php';
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