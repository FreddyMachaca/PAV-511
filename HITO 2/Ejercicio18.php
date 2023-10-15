<!DOCTYPE html>
<html>
<head>
    <title>Comprobación de Email</title>
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

        .email-container {
            text-align: center;
            background-color: #ffffff;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            width: 400px;
        }

        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .input:focus {
            outline: none;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
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

        .result {
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }

        .valid {
            color: #27ae60;
        }

        .invalid {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <form method="get">
            <input class="input" type="email" name="email" placeholder="Ingrese su correo electrónico">
            <button class="button" type="submit">Comprobar</button>
        </form>
        
        <?php
        $email = $_GET['email'] ?? '';

        if ($email !== '') {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p class='result valid'>El correo electrónico <strong>$email</strong> es válido.</p>";
            } else {
                echo "<p class='result invalid'>El correo electrónico <strong>$email</strong> no es válido.</p>";
            }
        } else {
            echo "<p class='result'>No se ha proporcionado un correo electrónico.</p>";
        }
        ?>
    </div>
</body>
</html>
