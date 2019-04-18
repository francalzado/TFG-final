<html>
    <?php
    include_once 'app/log.inc.php';
    include_once 'app/ControlSesion.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/Redireccion.inc.php';
    ?>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

        <style>
            table.blueTable {
                font-family: Arial, Helvetica, sans-serif;
                border: 1px solid #1C6EA4;
                background-color: #EEEEEE;
                width: 100%;
                height: 200px;
                text-align: center;
                border-collapse: collapse;
            }
            table.blueTable td, table.blueTable th {
                border: 2px solid #AAAAAA;
                padding: 2px 9px;
            }
            table.blueTable tbody td {
                font-size: 16px;
                font-weight: bold;
            }
            table.blueTable tr:nth-child(even) {
                background: #D0E4F5;
            }
            table.blueTable thead {
                background: #1C6EA4;
                background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
                background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
                background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
                border-bottom: 2px solid #444444;
            }
            table.blueTable thead th {
                font-size: 20px;
                font-weight: bold;
                color: #FFFFFF;
                text-align: center;
                border-left: 2px solid #D0E4F5;
            }
            table.blueTable thead th:first-child {
                border-left: none;
            }

            table.blueTable tfoot {
                font-size: 13px;
                font-weight: bold;
                color: #FFFFFF;
                background: #D0E4F5;
                background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
                background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
                background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
                border-top: 2px solid #444444;
            }
            table.blueTable tfoot td {
                font-size: 13px;
            }
            table.blueTable tfoot .links {
                text-align: right;
            }
            table.blueTable tfoot .links a{
                display: inline-block;
                background: #1C6EA4;
                color: #FFFFFF;
                padding: 2px 8px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body style='background-color:#02d1a4'>
