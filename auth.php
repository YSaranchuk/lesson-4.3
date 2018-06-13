<?php
use models\Auth\Auth as Auth;
require_once __DIR__ . '/src/core.php';
$auth = new Auth;
if ($auth->isAuth()) {
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>

<form method="POST" class="auth">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="submit" name="authButton" value="Войти"><br>
    <a class="switcher" href=".">Нет аккаунта? Зарегистрируйтесь!</a>
</form>
</body>
</html>