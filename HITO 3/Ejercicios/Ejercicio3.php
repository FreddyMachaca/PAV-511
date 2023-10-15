<link rel="stylesheet" type="text/css" href="./styles.css">

<?php
require '../config.php';
/*Ejercicio 3
Actualizar el Teléfono de la Id = 2, con 61222202 y luego mostrar los datos.
*/

// Conectar a la base de datos
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Actualizar el Teléfono del empleado con Id = 2
$query = "UPDATE Empleado SET Teléfono = '61222202' WHERE Id = 2";
if ($conn->query($query) === TRUE) {
    echo "<h1>Ejercicio 3</h1>";
    echo "Teléfono actualizado con éxito.<br>";

    // Mostrar los datos actualizados
    $query = "SELECT * FROM Empleado WHERE Id = 2";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Id: " . $row["Id"] . " Nombre: " . $row["Nombre"] . " Apellidos: " . $row["Apellidos"] . " Cargo: " . $row["Cargo"] . " Dirección: " . $row["Dirección"] . " Teléfono: " . $row["Teléfono"] . " Salario: $" . $row["Salario"] . "<br>";
    } else {
        echo "Empleado no encontrado.";
    }
} else {
    echo "Error al actualizar el teléfono: " . $conn->error;
}

$conn->close();
?>
