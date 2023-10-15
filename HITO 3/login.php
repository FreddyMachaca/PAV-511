<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para verificar las credenciales
    $sql = "SELECT id, nombre_usuario, nombre_completo FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Iniciar sesión y redirigir al usuario a la página index.php
        $stmt->bind_result($user_id, $user_username, $user_fullname);
        $stmt->fetch();

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_username'] = $user_username;
        $_SESSION['user_fullname'] = $user_fullname;

        $stmt->close();
        $conn->close();
        header('Location: index.php');
        exit();
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Iniciar Sesión</h2>
            <form method="post">
                <input type="text" name="username" placeholder="Nombre de usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
            <?php if (isset($error)) { echo '<p class="error-message">' . $error . '</p>'; } ?>
        </div>
    </div>
</body>
</html>

