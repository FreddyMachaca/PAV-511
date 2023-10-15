<?php
//Mostrar los números múltiplos de un número pasado por la URL que hay del 1 al 100.

$numero = $_GET["numero"];
for ($i = 1; $i <= 100; $i++) {
    if ($i % $numero == 0) {
        echo $i . "<br>";
    }
}
//ejemplo de url
//http://localhost:8080/Ejercicio9.php?numero=5
?>