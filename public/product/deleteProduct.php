<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;
$id = (int)$id;

if (!$id) {
    echo 'id не определён';
    exit();
}

deleteProduct($id);

echo render(TEMPLATES_DIR . 'index.tpl',[
    'title' => 'Удаление товара',
    'css' => CSS,
    'menu' => addMenu($menu),
    'h1' => 'Удаление товара',
    'login' => choiceIcon(),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'content' => '<div>Товар удалён</div>'
]);