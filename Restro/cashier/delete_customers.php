<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

check_login();

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];

    // Delete the customer from the database
    $deleteQuery = "DELETE FROM rpos_clientes WHERE cliente_id = ?";
    $deleteStmt = $mysqli->prepare($deleteQuery);
    $deleteStmt->bind_param('s', $delete);
    $deleteStmt->execute();

    if ($deleteStmt) {
        // Customer deleted successfully
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        // Failed to delete the customer
        echo "No se pudo eliminar al cliente. Inténtalo de nuevo.";
    }
}

$mysqli->close();
?>
