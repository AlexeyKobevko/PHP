<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;
$id = (int)$id;

if (!$id) {
    echo 'id не определён';
    exit();
}

echo render(TEMPLATES_DIR . 'index.tpl',[
    'title' => 'Удаление товара',
    'css' => CSS,
    'menu' => addMenu($menu),
    'h1' => 'Удаление товара',
    'login' => choiceIcon(),
    'content' => render(TEMPLATES_DIR . 'product/question.tpl',[
        'id' => $id
    ])
]);