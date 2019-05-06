<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_SESSION['login'])) {
    header('Location: /login.php');
}
if ((int)$_SESSION['login']['role'] !== 1) {
    header('Location: /login.php');
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Контроль заказов',
    'h1' => 'Контроль заказов',
    'css' => CSS,
    'login' => choiceIcon(),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'content' => generateOrdersControlPage()
]);
