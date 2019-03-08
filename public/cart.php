<?php

require_once __DIR__ . '/../config/config.php';

$good = $_SESSION['cart'];
var_dump($good);
render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Корзина',
    'h1' => 'корзина',
    'css' => CSS,
    'content' => ''
]);