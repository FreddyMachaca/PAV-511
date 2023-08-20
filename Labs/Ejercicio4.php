<?php
//Imprimir por pantalla la tabla de multiplicar del número pasado en un parámetro GET por la URL.
//Si no se pasa ningún parámetro GET, se debe mostrar un mensaje de error.
//Ejemplo de URL: http://localhost:8000/Ejercicio4.php?numero=5

if (isset($_GET["numero"])) {
    $numero = $_GET["numero"];
    echo "<h1>Tabla de multiplicar del $numero</h1>";
    echo "<table border='1'>";
    for ($i = 1; $i <= 10; $i++) {
        $producto = $numero * $i;
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>x</td>";
        echo "<td>$i</td>";
        echo "<td>=</td>";
        echo "<td>$producto</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<h1>Error: no se ha pasado ningún parámetro GET</h1>";
}

    

