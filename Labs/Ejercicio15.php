<?php
//Crea un script PHP que tenga tres variables, un tipo array, otra tipo string y otra boleana y que imprima un mensaje según el tipo de variable que sea.
$miArray = array(1, 2, 3);
$miString = "Hola, soy una cadena de texto";
$miBooleano = true;

if (is_array($miArray)) {
    echo "La variable es un array.";
} elseif (is_string($miString)) {
    echo "La variable es una cadena de texto.";
} elseif (is_bool($miBooleano)) {
    echo "La variable es un booleano.";
} else {
    echo "La variable no es de un tipo conocido.";
}
?>
