<?php
//Escribe un programa que muestre la dirección IP del usuario que visita nuestra web y si usa Firefox darle la enhorabuena.

$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];

echo "Tu IP es: " . $ip . "<br>";
echo "Tu navegador es: " . $browser . "<br>";

if (strpos($browser, 'Firefox') !== false) {
    echo "Enhorabuena, usas Firefox";
}
?>