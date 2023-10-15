<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            margin: 0;
            padding: 0;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #333;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 40px;
            width: 400px;
        }

        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }

        .input:focus {
            outline: none;
        }

        .dark-mode-button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            float: right;
        }

        .dark-mode-button:hover {
            background-color: #444;
        }

        .submit-button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #219653;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #f39c12;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="post">
            <input class="input" type="text" name="ci" placeholder="CI" required>
            <input class="input" type="text" name="nombre" placeholder="Nombre" required>
            <input class="input" type="text" name="apellidos" placeholder="Apellidos" required>
            <input class="input" type="url" name="url" placeholder="URL" required>
            <button class="submit-button" type="submit">Verificar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ci = $_POST['ci'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $apellidos = $_POST['apellidos'] ?? '';
            $url = $_POST['url'] ?? '';

            $ciValido = preg_match('/^\d+$/', $ci);
            $nombreValido = preg_match('/^[A-Za-záéíóúüñ\s]+$/', $nombre);
            $apellidosValidos = preg_match('/^[A-Za-záéíóúüñ\s]+$/', $apellidos);
            $urlValida = filter_var($url, FILTER_VALIDATE_URL);

            echo "<div class='result'>";
            if ($ciValido && $nombreValido && $apellidosValidos && $urlValida) {
                echo "Los datos son válidos.";
            } else {
                echo "Alguno(s) de los datos no es válido.";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
