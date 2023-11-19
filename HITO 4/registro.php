<?php
// Inicializar el array de errores
$errores = array();

// Validar si se ha enviado el formulario
if (isset($_POST["enviar"])) {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];

    // Validar que los datos sean correctos
    if (empty($nombre)) {
        $errores["nombre"] = "El nombre es obligatorio";
    }
    if (empty($apellidos)) {
        $errores["apellidos"] = "Los apellidos son obligatorios";
    }
    if (empty($email)) {
        $errores["email"] = "El correo electrónico es obligatorio";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores["email"] = "El correo electrónico no es válido";
    }

    // Si no hay errores, insertar los datos en la base de datos
    if (empty($errores)) {
        // Conexión a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=registro_estudiantes", "root", "");

        // Insertar el nuevo registro en la base de datos
        $insercion = $conexion->prepare("INSERT INTO estudiantes (nombre, apellidos, email, celular) VALUES (?, ?, ?, ?)");
        $insercion->execute([$nombre, $apellidos, $email, $celular]);

        // Redirigir a index.php después de la inserción
        header("Location: index.php");
        exit(); // Asegurarse de que el script se detenga después de la redirección
    }
}
?>
