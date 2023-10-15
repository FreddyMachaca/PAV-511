<link rel="stylesheet" type="text/css" href="./styles.css">

<?php
require '../config.php';
/*Ejercicio 2
Quieres realizar una consulta para obtener el nombre, apellido, cargo y salario de
todos los empleados cuyo salario sea superior a $2800.
*/

// Conectar a la base de datos
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener nombre, apellido, cargo y salario de empleados con salario superior a $2800
$query = "SELECT Nombre, Apellidos, Cargo, Salario FROM Empleado WHERE Salario > 2800";
$result = $conn->query($query);

echo "<h1>Ejercicio 2</h1>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Nombre: " . $row["Nombre"] . " Apellidos: " . $row["Apellidos"] . " Cargo: " . $row["Cargo"] . " Salario: $" . $row["Salario"] . "<br>";
    }
} else {
    echo "No se encontraron empleados con salario superior a $2800.";
}

$conn->close();
?>
