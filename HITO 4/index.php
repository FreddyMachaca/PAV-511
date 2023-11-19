<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de estudiantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        padding: 30px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .logo {
        width: 100%;
        max-width: 330px;
        height: auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .registro {
        border: 1px solid #dee2e6;
        padding: 30px;
        border-radius: 12px;
        background-color: #f8f9fa;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .registro h1 {
        color: #007bff;
    }

    .form-label {
        color: #495057;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .tabla {
        margin-top: 30px;
        border: 1px solid #dee2e6;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .tabla th {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        text-align: center;
        font-weight: bold;
    }

    .tabla td {
        padding: 15px;
        text-align: center;
    }
</style>

</head>

<body>

    <?php include "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center">
                <img src="logo.png" alt="Logo de la universidad" class="logo">
            </div>
            <div class="col-lg-9">
                <div class="registro">
                    <h1>Registro de estudiantes</h1>
                    <form action="registro.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular:</label>
                            <input type="tel" class="form-control" id="celular" name="celular" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
                    </form>
                </div>
                <table class="table table-bordered tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo electrónico</th>
                            <th>Celular</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Conexión a la base de datos
                        $conexion = new PDO("mysql:host=localhost;dbname=registro_estudiantes", "root", "");

                        // Consulta para obtener los estudiantes registrados
                        $consulta = $conexion->prepare("SELECT * FROM estudiantes");
                        $consulta->execute();

                        // Recorrer los resultados de la consulta y mostrarlos en la tabla
                        while ($estudiante = $consulta->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $estudiante["nombre"] . "</td>";
                            echo "<td>" . $estudiante["apellidos"] . "</td>";
                            echo "<td>" . $estudiante["email"] . "</td>";
                            echo "<td>" . $estudiante["celular"] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
