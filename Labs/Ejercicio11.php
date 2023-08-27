<?php
/*
Hacer un programa que tenga un array de 5 números enteros y hacer lo siguiente con él: 1. 2. 3. 4.
1. Recorrerlo y mostrarlo.
2. Ordenarlo y mostrarlo.
3. Mostrará su longitud.
4. Buscar en el vector.
*/

$vector = array(1, 2, 3, 4, 5);
//1. Recorrerlo y mostrarlo.
echo "1. Recorrerlo y mostrarlo.<br>";
for ($i = 0; $i < count($vector); $i++) {
    echo $vector[$i] . "<br>";
}
//2. Ordenarlo y mostrarlo.
echo "2. Ordenarlo y mostrarlo.<br>";
sort($vector);
for ($i = 0; $i < count($vector); $i++) {
    echo $vector[$i] . "<br>";
}
//3. Mostrará su longitud.
echo "3. Mostrará su longitud.<br>";
echo count($vector) . "<br>";
//4. Buscar en el vector.
echo "4. Buscar en el vector.<br>";
$posicion = array_search(3, $vector);
echo $posicion . "<br>";
?>
