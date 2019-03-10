<?php

require_once __DIR__ . '/../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if (!$id) {
    echo 'id не определён';
    exit();
}

$id = (int)$id;

echo render((isAdmin()) ? TEMPLATES_DIR . 'admin/adminCatalog.tpl' : TEMPLATES_DIR . 'catalog.tpl', [
    'title' => 'Каталог',
    'css' => CSS,
    'menu' => addMenu($menu),
    'login' => choiceIcon(),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'content' => showProduct($id)
]);