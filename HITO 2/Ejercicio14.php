<?php
//Escribe un programa que compruebe si una variable está vacía y si está vacía, rellenarla con texto en minúsculas y mostrarlo convertido a mayúsculas en negrita.
$miVariable = ""; // Puedes cambiar esto por la variable que quieras comprobar

if (empty($miVariable)) {
    $miVariable = "texto en minúsculas";
    $miVariableMayusculas = strtoupper($miVariable);
    echo "<strong>" . $miVariableMayusculas . "</strong>";
} else {
    echo strtoupper($miVariable);
}
?>
