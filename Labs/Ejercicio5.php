<?php
//Crear un array llamado meses y que almacene el nombre de los doce meses del año. Recorrerlo con FOR para mostrar por pantalla los doce nombres.
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
               "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
for ($i = 0; $i < count($meses); $i++) {
    echo $meses[$i] . "<br>";
}
?>