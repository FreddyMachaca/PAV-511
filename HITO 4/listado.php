<?php
// Consulta para obtener el listado de estudiantes
$consulta = "SELECT * FROM estudiantes";
$resultado = $conexion->query($consulta);

if ($resultado) {
    if ($resultado->rowCount() > 0) {
        echo '<h2>Listado de Estudiantes</h2>';
        echo '<table class="table">';
        echo '<thead><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Celular</th></tr></thead><tbody>';

        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $fila['id'] . '</td>';
            echo '<td>' . $fila['nombre'] . '</td>';
            echo '<td>' . $fila['apellidos'] . '</td>';
            echo '<td>' . $fila['email'] . '</td>';
            echo '<td>' . $fila['celular'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    } else {
        echo '<p>No hay estudiantes registrados.</p>';
    }
} else {
    echo '<p>Error al recuperar el listado de estudiantes.</p>';
}
?>
