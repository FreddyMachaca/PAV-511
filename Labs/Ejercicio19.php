<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Multiplicar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .multiplication-container {
            text-align: center;
            background-color: #ffffff;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            width: 400px;
        }

        .input {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input:focus {
            outline: none;
            border-color: #27ae60;
        }

        .button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #219653;
        }

        .multiplication-table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        .multiplication-table th, .multiplication-table td {
            padding: 10px 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .multiplication-table th {
            background-color: #27ae60;
            color: white;
        }

        .multiplication-table td {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="multiplication-container">
        <form method="post">
            <input class="input" type="number" name="numero" placeholder="Ingrese un número">
            <button class="button" type="submit">Generar Tabla</button>
        </form>

        <?php
        if (isset($_POST['numero'])) {
            $numeroParaTabla = $_POST['numero'];

            echo "<table class='multiplication-table'>";
            echo "<tr><th colspan='2'>Tabla de multiplicar del $numeroParaTabla</th></tr>";

            for ($i = 1; $i <= 10; $i++) {
                $resultado = $numeroParaTabla * $i;
                echo "<tr><td>$numeroParaTabla x $i</td><td>$resultado</td></tr>";
            }

            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
