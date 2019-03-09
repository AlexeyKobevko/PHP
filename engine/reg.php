<?php

function insertUser($name, $login, $password, $groop = 'user') {
    $db = createConnection();

    $name = escapeString($db, $name);
    $login = escapeString($db, $login);
    $password = escapeString($db, $password);

    $sql = "INSERT INTO `users`(`name`, `login`, `password`, `groop`) VALUES ('$name', '$login', '$password', '$groop')";

    return execQuery($sql, $db);
}

function loginUser($login, $password)
{
    if ($login && $password) {
        $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
        $user = show($sql);

        if ($user) {
            $_SESSION['login'] = $user;

            header("Location: /profile.php");
        } else {
            echo 'Неверная пара логин-пароль, попробуйте ещё раз';
        }
    }
}