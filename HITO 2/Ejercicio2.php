<?php
//Modifica el ejercicio anterior para que muestre al lado de cada cuadrado si es un número par o impar
for ($i = 1; $i <= 30; $i++) {
    $cuadrado = $i * $i;
    $paridad = ($cuadrado % 2 == 0) ? "par" : "impar";
    echo "El cuadrado de $i es: $cuadrado (Número $paridad)\n";
    echo "<br>";
}
?>
