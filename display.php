<?php
// display.php
$fullname = htmlspecialchars($_POST['fullname']);
$password = htmlspecialchars($_POST['password']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация завершена</title>
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            padding: 40px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2E363E;
            margin-bottom: 20px;
        }
        .data {
            background: #F2F6FA;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .back-btn {
            display: inline-block;
            background-color: #5D6AFB;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Регистрация завершена!</h2>
        <div class="data">
            <p><strong>Логин:</strong> <?php echo $fullname; ?></p>
            <p><strong>Пароль:</strong> <?php echo $password; ?></p>
        </div>
        <a href="index.html" class="back-btn">Вернуться на главную</a>
    </div>
</body>
</html>