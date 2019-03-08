<?php

require_once __DIR__ . '/../config/config.php';

function error($error_text)
{
    header('Content-Type: application/json');
    echo json_encode([
        'error' => true,
        'error_text' => $error_text,
        'data' => null
    ]);
    exit();
}

if (empty($_POST['apiMethod'])) {
    error('Не передан apiMethod');
    exit();
}

function success($data = true)
{
    header('Content-Type: application/json');
    echo json_encode([
        'error' => false,
        'error_text' => null,
        'data' => $data
    ]);
    exit();
}

if ($_POST['apiMethod'] === 'login') {
    $login = $_POST['postData']['login'] ?? '';
    $password = $_POST['postData']['password'] ?? '';

    if (!$login || !$password) {
        error('Логин или пароль не переданы');
    }

    $password = md5($password);
    $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
    $user = show($sql);

    if ($user) {
        $_SESSION['login'] = $user;
        echo 'OK';

    } else {
        error('Неверная пара логин-пароль, попробуйте ещё раз');
    }
}

if (empty($_POST['apiMethod'])) {
    error('Корзина пуста');
    exit();
}

if ($_POST['apiMethod'] === 'good') {
    $id = $_POST['postData']['id'] ?? '';

    $sql = "SELECT * FROM `products` WHERE `id` = '$id'";
    $good = show($sql);

    if ($good) {
        $_SESSION['cart'] = $good;
        echo 'OK';

    } else {
        error('Что-то пошло не так');
    }
}