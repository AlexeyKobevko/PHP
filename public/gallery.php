<?php

require_once __DIR__ . '/../config/config.php';

echo render(TEMPLATES_DIR . 'index.tpl', [
   'title' => 'Галерея',
   'h1' => 'Галерея',
    'menu' => addMenu($menu),
    'CSS' => CSS,
    'login' => choiceIcon(),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'content' => createGallery()
]);
