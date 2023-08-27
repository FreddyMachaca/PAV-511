<?php
//Un número es bueno si y solo si la suma de sus divisores sin contarse el mismo da ese número.
//Programa que calcule si un número es bueno o no

$numero = 6;
$suma = 0;
for ($i = 1; $i < $numero; $i++) {
    if ($numero % $i == 0) {
        $suma = $suma + $i;
    }
}
if ($suma == $numero) {
    echo "El número " . $numero . " es bueno";
} else {
    echo "El número " . $numero . " no es bueno";
}
?>