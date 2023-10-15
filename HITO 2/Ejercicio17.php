<!DOCTYPE html>
<html>
<head>
    <title>Fecha Actual</title>
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

        .date-container {
            text-align: center;
            background-color: #ffffff;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        .date {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .day {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="date-container">
        <?php
        date_default_timezone_set('America/New_York'); // Cambia a tu zona horaria
        $currentDate = date('d F Y');
        $currentDay = date('l');
        ?>
        <div class="date"><?php echo $currentDate; ?></div>
        <div class="day"><?php echo $currentDay; ?></div>
    </div>
</body>
</html>
