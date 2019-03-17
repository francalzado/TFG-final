<?php

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar-inicio.inc.php';


?>
<!--<html>
<head>
    <script language="JavaScript">
 
    /* Determinamos el tiempo total en segundos */
    var totalTiempo=60;
    /* Determinamos la url del archivo o del boton de descarga,(en ejemplo descarga de freebsd */
    var url="http://ftp.freebsd.org/pub/FreeBSD/releases/ISO-IMAGES/10.0/CHECKSUM.MD5-10.0-RELEASE-amd64";
 
    function updateReloj()
    {
        document.getElementById('CuentaAtras').innerHTML = "Tiempo BONUS "+totalTiempo+" segundos";
 
        if(totalTiempo==0)
        {
            window.location=url;
        }else{
            /* Restamos un segundo al tiempo restante */
            totalTiempo-=1;
            /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
            setTimeout("updateReloj()",1000);
        }
    }
 
    window.onload=updateReloj;
 
    </script>
</head>
 
<body>

<h2 id='CuentaAtras'></h2>
 
</body>
</html>-->


<script>

//cambia este texto para indicar el acontecimiento que desees
var before="Navidad."
var current="Hoy es Navidad. ¡Felices Pascuas!"
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")

function countdown(yr,m,d){
var today=new Date()
var todayy=today.getYear()
if (todayy < 1000)
todayy+=1900
var todaym=today.getMonth()
var todayd=today.getDate()
var todaystring=montharray[todaym]+" "+todayd+", "+todayy
var futurestring=montharray[m-1]+" "+d+", "+yr
var difference=(Math.round((Date.parse(futurestring)-Date.parse(todaystring))/(24*60*60*1000))*1)
if (difference==0)
document.write(current)
else if (difference>0)
document.write("<FONT FACE=verdana SIZE=5 COLOR=#FF0000>Sólo quedan "+difference+" días para "+before+"</FONT>")
}
//usa la fecha del evento que quieres señalar en el formato año/mes/día
countdown(2001,12,25)
</script>