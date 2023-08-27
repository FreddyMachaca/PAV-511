<?php
//Escribir un programa que calcule el factorial de 5.
//El factorial de un número entero N es una operación matemática que consiste en multiplicar todoslos factores N x (N − 1) x (N − 2) x . . . x 1.
//Así, el factorial de 5 (escrito como 5!) es igual a: 5! = 5 x 4 x 3 x 2 x 1 = 120

$factorial = 1;
for ($i = 1; $i <= 5; $i++) {
    $factorial = $factorial * $i;
}
echo "El factorial de 5 es: " . $factorial;
?>