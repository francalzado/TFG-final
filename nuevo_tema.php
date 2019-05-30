<?php
include_once './Control/control_nuevo_tema.inc.php';
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
                    Nuevo Tema
                </h1>
            </div>
            <div class="card-body">

                <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                    <div class="form-group">
                        <input type="text" name="enlace" class="form-control" placeholder="Titulo del tema" autofocus/>
                        <input type="hidden" name="txtId_asignatura" value="<?php echo $id_asignatura; ?>">

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
