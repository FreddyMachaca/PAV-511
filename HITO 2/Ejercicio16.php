<?php
$tabla = array(
    array("Frutas", "Deportes", "Idiomas"),
    array("Manzana", "Futbol", "Español"),
    array("Naranja", "Tenis", "Inglés"),
    array("Sandia", "Baloncesto", "Francés"),
    array("Fresa", "Béisbol", "Italiano")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            max-width: 800px;
            background-color: #ffffff;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <?php foreach ($tabla as $index => $fila): ?>
            <tr>
                <?php foreach ($fila as $dato): ?>
                    <?php if ($index === 0): ?>
                        <th><?php echo $dato; ?></th>
                    <?php else: ?>
                        <td><?php echo $dato; ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
