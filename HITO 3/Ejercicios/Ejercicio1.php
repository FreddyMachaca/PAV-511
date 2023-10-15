<link rel="stylesheet" type="text/css" href="./styles.css">

<?php
require '../config.php'; 

/*Ejercicio 1
Mostrar todos los datos de los empleados cuyo nombre sea Juan y su Dirección sea
San Pedro.
*/

// Conectar a la base de datos
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para mostrar los datos de los empleados con nombre "Juan" y dirección "San Pedro"
$query = "SELECT * FROM Empleado WHERE Nombre = 'Juan' AND Dirección = 'San Pedro'";
$result = $conn->query($query);

echo "<h1>Ejercicio 1</h1>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Id"] . " Nombre: " . $row["Nombre"] . " Apellidos: " . $row["Apellidos"] . " Cargo: " . $row["Cargo"] . " Dirección: " . $row["Dirección"] . " Teléfono: " . $row["Teléfono"] . " Salario: $" . $row["Salario"] . "<br>";
    }
} else {
    echo "No se encontraron empleados con los criterios especificados.";
}

$conn->close();
?>
