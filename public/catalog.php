<?php

require_once __DIR__ . '/../config/config.php';

echo render((isAdmin()) ? TEMPLATES_DIR . 'admin/adminCatalog.tpl' : TEMPLATES_DIR . 'catalog.tpl', [
    'title' => 'Каталог',
    'css' => CSS,
    'menu' => addMenu($menu),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'login' => choiceIcon(),
    'content' => createProducts()
]);