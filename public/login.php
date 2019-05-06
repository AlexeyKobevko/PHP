<?php

require_once __DIR__ . '/../config/config.php';

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Авторизиция',
    'h1' => 'Автроизация',
    'css' => CSS,
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'login' => render(TEMPLATES_DIR . 'loginButtons.tpl'),
    'content' => render(TEMPLATES_DIR . 'login.tpl')
]);


