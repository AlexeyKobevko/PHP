<?php

require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password);

    insertUser($name, $login, $password);

    loginUser($login, $password);
}


echo render(TEMPLATES_DIR . 'index.tpl', [
    'css' => CSS,
    'title' => 'Регистрация',
    'h1' => 'Регистрация',
    'menu' => addMenu($menu),
    'content' => render(TEMPLATES_DIR . 'registration.tpl')
]);