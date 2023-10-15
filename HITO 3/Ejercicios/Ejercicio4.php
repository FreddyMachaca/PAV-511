<link rel="stylesheet" type="text/css" href="./styles.css">

<?php
require '../config.php';
/*Ejercicio 4
Mostrar el Id, Nombre, Apellidos y Salario de todos los empleados cuyo Apellido empiece con L.
*/

// Conectar a la base de datos
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para mostrar Id, Nombre, Apellidos y Salario de empleados cuyo Apellido empiece con L
$query = "SELECT Id, Nombre, Apellidos, Salario FROM Empleado WHERE Apellidos LIKE 'L%'";
$result = $conn->query($query);

echo "<h1>Ejercicio 4</h1>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Id"] . " Nombre: " . $row["Nombre"] . " Apellidos: " . $row["Apellidos"] . " Salario: $" . $row["Salario"] . "<br>";
    }
} else {
    echo "No se encontraron empleados cuyo Apellido empiece con L.";
}

$conn->close();
?>
