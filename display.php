<?php
session_start();

if (!isset($_SESSION['submit_count'])) {
    $_SESSION['submit_count'] = 0;
}

$fullname = isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '';
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

$is_valid = false;
$error_message = '';
$attempts_before_success = 0; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['submit_count']++;
    
    $fullname_length = mb_strlen($fullname);
    $password_length = mb_strlen($password);
    
    if ($fullname_length >= 6 && $password_length >= 6) {
        $is_valid = true;
        $attempts_before_success = $_SESSION['submit_count'];
        $_SESSION['submit_count'] = 0;
    } else {
        $error_message = 'Ошибка! Логин и пароль должны содержать не менее 6 символов!';
    }
}

$form_file = 'index.html';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $is_valid ? 'Регистрация завершена' : 'Ошибка валидации'; ?>
    </title>
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
        .error {
            background: #FFEBEE;
            color: #D32F2F;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #D32F2F;
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
        .back-btn:hover {
            background-color: #4a57e0;
        }
        .count-info {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
        .attempt-counter {
            background: #E8F5E9;
            color: #2E7D32;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #4CAF50;
        }
        .attempt-number {
            font-weight: bold;
            color: #1B5E20;
            font-size: 18px;
        }
        .success-message {
            color: #2E7D32;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($is_valid): ?>
            <h2>Регистрация завершена!</h2>
            
            <div class="attempt-counter">
                <p><strong>Статистика регистрации:</strong></p>
                <p>Регистрация прошла успешно с <span class="attempt-number"><?php echo $attempts_before_success; ?></span> попытки!</p>
            </div>
            
            <div class="data">
                <p><strong>Логин:</strong> <?php echo $fullname; ?></p>
                <p class="count-info">(символов: <?php echo mb_strlen($fullname); ?>)</p>
                <p><strong>Пароль:</strong> <?php echo $password; ?></p>
                <p class="count-info">(символов: <?php echo mb_strlen($password); ?>)</p>
            </div>
            
            <a href="<?php echo $form_file; ?>" class="back-btn">Вернуться на главную</a>
            
        <?php else: ?>
            <h2>Ошибка валидации</h2>
            
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <div class="attempt-counter">
                    <p>Попытка №<span class="attempt-number"><?php echo $_SESSION['submit_count']; ?></span></p>
                </div>
            <?php endif; ?>
            
            <?php if ($error_message && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <div class="error">
                    <p><strong><?php echo $error_message; ?></strong></p>
                    <?php if ($fullname !== ''): ?>
                        <p>Введено символов в логине: <?php echo mb_strlen($fullname); ?> (требуется: 6+)</p>
                    <?php endif; ?>
                    <?php if ($password !== ''): ?>
                        <p>Введено символов в пароле: <?php echo mb_strlen($password); ?> (требуется: 6+)</p>
                    <?php endif; ?>
                </div>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
                <div class="error">
                    <p><strong>Данные не были отправлены!</strong></p>
                    <p>Пожалуйста, заполните форму на главной странице.</p>
                </div>
            <?php endif; ?>
            
            <?php if ($fullname !== '' || $password !== ''): ?>
                <div class="data">
                    <p><strong>Вы ввели:</strong></p>
                    <p>Логин: <?php echo $fullname ?: 'ф[не указано]'; ?></p>
                    <p>Пароль: <?php echo $password ?: '[не указано]'; ?></p>
                </div>
            <?php endif; ?>
            
            <a href="<?php echo $form_file; ?>" class="back-btn">Вернуться на главную</a>
        <?php endif; ?>
    </div>
</body>
</html>