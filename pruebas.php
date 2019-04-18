<html>
<body>

<p>Click the button to display a confirm box.</p>

<button onclick="Reloj()">Try it</button>

<p id="demo"></p>
<p id="demo2"></p>

<?php 
    $variable = (isset($_GET['demo2'])) ? $_GET['demo2'] : "0";
    $variable = $_GET['demo2']; 
           echo $variable
                   ?>

<script>
function myFunction() {
  var txt;
  var r = confirm("Press a button!");
  if (r == true) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>

<script>
/* Determinamos el tiempo total en segundos */
    var totalTiempo = 60;
    /* Determinamos la url del archivo o del boton de descarga,(en ejemplo descarga de freebsd */
    var url = "http://ftp.freebsd.org/pub/FreeBSD/releases/ISO-IMAGES/10.0/CHECKSUM.MD5-10.0-RELEASE-amd64";

    function updateReloj()
    {
        document.getElementById('CuentaAtras').innerHTML = "Tiempo BONUS: " + totalTiempo + "";
        var data = {};

        /* Restamos un segundo al tiempo restante */
        if (totalTiempo != 0)
            totalTiempo -= 1;
        data.totalTiempo = totalTiempo;
        /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
        setTimeout("updateReloj()", 1000);
        totalTiempo1 = totalTiempo;
    }

    window.onload = updateReloj;
    var url = 'flashcard_estudiante.php';

    $.ajax({
        method: 'POST',
        url: url,
        data: data, //acá están todos los parámetros (valores a enviar) del POST
        success: function (response) {
            // Se ejecuta al finalizar
            //   mostrar si está OK en consola
            console.log(response);
        }});
        function Reloj(){
        document.getElementById("demo2").innerHTML = totalTiempo;
        }
</script>
                <h2 id='CuentaAtras'></h2>
                
</html>

