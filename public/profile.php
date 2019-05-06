<?php

require_once __DIR__ . '/../config/config.php';
if (!$_SESSION['login']){
    header('Location: /login.php');
}
$name = $_SESSION['login']['name'];
$login = $_SESSION['login']['login'];

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Профиль',
    'h1' => 'Профиль пользователя',
    'css' => CSS,
    'login' => choiceIcon(),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'content' => render(TEMPLATES_DIR . 'profile.tpl', [
        'name' => $name,
        'login' => $login
    ])
]);