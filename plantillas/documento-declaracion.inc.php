<html>
    <?php
    include_once 'app/log.inc.php';
    include_once 'app/ControlSesion.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/Redireccion.inc.php';

    ?>
    <head>
        
    <body style='background-color:#02d1a4'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php
if (!isset($titulo) || empty($titulo)) {
    $titulo = 'AppLearn';
}
echo "<title>$titulo</title>";
?>

        <!-- BOOSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- MI PROPIO CSS MAIN -->
        <link href="css/boostrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">

    </head>
<body>