<?php

require_once __DIR__ . '/../config/config.php';

$name = $_SESSION['login']['name'];
$login = $_SESSION['login']['login'];

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Профиль',
    'h1' => 'Профиль пользователя',
    'css' => CSS,
    'content' => render(TEMPLATES_DIR . 'profile.tpl', [
        'name' => $name,
        'login' => $login
    ])
]);