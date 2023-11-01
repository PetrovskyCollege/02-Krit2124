<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="reg.php" method="POST">
    <label for="login">Логин</label>
    <input type="text" name="login" id="login">
    <label for="pass">Пароль </label>
    <input type="password" name="pass" id="pass">
    <button type="submit">Отпрвить</button>
</form>
</body>
</html>

<?php
if (isset($_GET["login"])) {
    echo "<h2>Привет, GET " . $_GET["login"] . "! </h2>";
}

if (isset($_POST["login"])) {
    echo "<h2>Привет POST, " . $_POST["login"] . "! </h2>";
}

