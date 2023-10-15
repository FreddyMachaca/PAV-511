<link rel="stylesheet" type="text/css" href="./styles.css">

<?php
require '../config.php';
/*Ejercicio 5
Mostrar el Id, Nombre, Apellidos, Teléfono y Salario de todos los empleados cuyo
Teléfono termine con 48.
*/

// Conectar a la base de datos
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para mostrar Id, Nombre, Apellidos, Teléfono y Salario de empleados cuyo Teléfono termine con 48
$query = "SELECT Id, Nombre, Apellidos, Teléfono, Salario FROM Empleado WHERE Teléfono LIKE '%48'";
$result = $conn->query($query);

echo "<h1>Ejercicio 5</h1>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Id"] . " Nombre: " . $row["Nombre"] . " Apellidos: " . $row["Apellidos"] . " Teléfono: " . $row["Teléfono"] . " Salario: $" . $row["Salario"] . "<br>";
    }
} else {
    echo "No se encontraron empleados cuyo Teléfono termine con 48.";
}

$conn->close();
?>
