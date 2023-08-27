<?php
//Escribe un programa que añada valores a un array mientras que su longitud sea menor a 100 y después que se muestre la información del array por pantalla.
$vector = array();
for ($i = 0; $i < 100; $i++) {
    $vector[$i] = $i;
}
for ($i = 0; $i < count($vector); $i++) {
    echo $vector[$i] . "<br>";
}

?>