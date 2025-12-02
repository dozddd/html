<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $result = $login . ' ' . $password;
    
    echo $result;
} else {
    echo "Ошибка";
}
?>