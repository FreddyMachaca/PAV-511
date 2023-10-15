<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sesión Iniciada</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="welcome-message">
        <h2>Bienvenido, <?php echo $_SESSION['user_fullname']; ?>!</h2>
        <a href="salir.php">Cerrar Sesión</a>
    </div>

    <div class="content">
        <h3>Contenido</h3>
        <p>Bienvenido a nuestra aplicación web</p>
        <ul>
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="#">Mis Pedidos</a></li>
            <li><a href="#">Historial de Compras</a></li>
        </ul>
    </div>

    <div class="news">
        <h3>Noticias Recientes</h3>
        <ul>
            <li>
                <h4>Título de Noticia 1</h4>
                <p>Descripción de la noticia 1.</p>
            </li>
            <li>
                <h4>Título de Noticia 2</h4>
                <p>Descripción de la noticia 2.</p>
            </li>
            <li>
                <h4>Título de Noticia 3</h4>
                <p>Descripción de la noticia 3.</p>
            </li>
        </ul>
    </div>

    <div class="sidebar">
        <h3>Enlaces Útiles</h3>
        <ul>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Ayuda</a></li>
            <li><a href="#">Términos y Condiciones</a></li>
        </ul>
    </div>
</body>
</html>

