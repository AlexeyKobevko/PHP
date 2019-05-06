<?php

require_once __DIR__ . '/../config/config.php';

if (empty($_SESSION['login'])) {
    header('Location: /login.php');
}

$user_id = (int)$_SESSION['login']['id'];

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'css' => CSS,
    'title' => 'Мои заказы',
    'h1' => 'Мои заказы',
    'login' => choiceIcon(),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'content' => generateMyOrdersPage()
]);