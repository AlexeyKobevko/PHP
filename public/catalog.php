<?php

require_once __DIR__ . '/../config/config.php';

echo render(TEMPLATES_DIR . 'catalog.tpl', [
    'title' => 'Каталог',
    'css' => CSS,
    'menu' => addMenu($menu),
    'content' => createProducts()
]);