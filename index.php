<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <form action="index.php" method="POST" class="regForm">
        <h2>Регистрация</h2>
        <input type="text" name="loginToReg" placeholder="Логин">
        <input type="email" name="emailToReg" placeholder="Email">
        <input type="password" name="passToReg" placeholder="Пароль">
        <input type="password" name="passRepeatedToReg" placeholder="Повторите пароль">
        <div class="formButtons">
            <button type="submit" class="formButton" id="regSubmitButton">Зарегистрироваться</button>
            <input type="button" class="formButton" id="loginButton" value="Вход">
        </div>
    </form>

    <form action="index.php" method="POST" class="loginForm">
        <h2>Авторизация</h2>
        <input type="text" name="loginOrEmailToLogin" placeholder="Логин или Email">
        <input type="password" name="passToLogin" placeholder="Пароль">
        <div class="formButtons">
            <button type="submit" class="formButton" id="loginSubmitButton">Войти</button>
            <input type="button" class="formButton" id="regButton" value="Регистрация">
        </div>
    </form>

    <script src="script.js"></script>
</body>
</html>

<?
    if (isset($_POST["login"])) {
        echo "<h2>Привет, " . $_POST["login"] . "! </h2>";
    }

    // Регистрация
    // Проверка на содержание логина и пароля в POST для того, чтобы не выводилать ошибка
    if ((isset($_POST["loginToReg"])) && (isset($_POST["passToReg"]))) {
        // Проверка на то, что логин и пароль в POST не пустые для того, чтобы не сохранялись пользователи без данных
        if (($_POST["loginToReg"]!=NULL) && ($_POST["passToReg"]!=NULL)) {
            // Проверка на совпадение паролей
            if ($_POST["passToReg"] == $_POST["passRepeatedToReg"]) {
                // Установка соединения
                $mysqli = new mysqli("localhost", "root", "", "auth2124");

                // Запрос на добавление строк
                $sql = $mysqli->query("INSERT INTO `user` (`id`, `login`, `email`, `password`, `created_at`, `id_access_type`) 
                VALUES (NULL, '{$_POST["loginToReg"]}', '{$_POST["emailToReg"]}', '{$_POST["passToReg"]}', CURDATE(), '2')");

                if ($sql) {
                    // Обновление страницы для удаления данных и POST
                    header("Location: ".$_SERVER['REQUEST_URI']);
                } else {
                    echo '<p>Произошла ошибка при регистрации</p>';
                }
            } else {
                echo "<p>Пароли должны совпадать<p>";
            }
        }
        else {
            echo "<p>Поля должны быть заполнены<p>";
        }
    }

    // Вход
    if ((isset($_POST["loginOrEmailToLogin"])) && (isset($_POST["passToLogin"]))) {
        if (($_POST["loginOrEmailToLogin"]!=NULL) && ($_POST["passToLogin"]!=NULL)) {
            // Установка соединения
            $mysqli = new mysqli("localhost", "root", "", "auth2124");

            // Запрос на наличие пользователей с указанными логином и паролем
            $sql = $mysqli->query("SELECT * FROM `user` WHERE (`login` = '{$_POST["loginOrEmailToLogin"]}' OR `email` = '{$_POST["loginOrEmailToLogin"]}') AND `password` = '{$_POST["passToLogin"]}'");

            if (mysqli_num_rows($sql) > 0) {
                echo '<p>'.$_POST["loginOrEmailToLogin"].', авторизация прошла успешно</p>';
            } else {
                echo '<p>Логин или пароль введены неверно</p>';
            }
        }
    }
?>