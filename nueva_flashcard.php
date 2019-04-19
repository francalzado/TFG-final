<?php
include_once './Control/control_nueva_flashcard.inc.php';
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
                    Nueva FlashCard
                </h1>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                    <div class="form-group">
                        <input type="text" name="pregunta" class="form-control" placeholder="Titulo Pregunta" autofocus/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="r1" class="form-control" placeholder="Respuesta 1" />

                    </div>
                    <div class="form-group">
                        <input type="text" name="r2" class="form-control" placeholder="Respuesta 2" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="r3" class="form-control" placeholder="Respuesta 3" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="r4" class="form-control" placeholder="Respuesta 4" />
                    </div>
                    <div class="form-group">
                        <textarea name="cuerpo" class="form-control" placeholder="Cuerpo Pregunta"></textarea>
                    </div>
                    <div class="form-group">
                        <h6>Respuesta Correcta</h6>
                        <input type="radio" name="val" value="1" checked>   Respuesta 1  <br> 
                        <input type="radio" name="val" value="2" >   Respuesta 2   <br> 
                        <input type="radio" name="val" value="3" >   Respuesta 3   <br> 
                        <input type="radio" name="val" value="4" >   Respuesta 4   <br> 
                        <input type="hidden" name="txtId_tema" value="<?php echo $_GET['id_tema']; ?>">


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

