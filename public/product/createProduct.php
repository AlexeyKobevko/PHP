<?php

require_once __DIR__ . '/../../config/config.php';

$name = $_POST['name'] ?? '';
$desc = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$image = $_POST['image'] ?? '';

if ($name && $desc && $price) {

    if (!$image) {
        $image = '/img/products/soon.jpg';
    }

    $result = insertProduct($name, $desc, $price, $image);

    if ($result) {
        echo 'Товар успешно добавлен';
    } else {
        echo 'Произошла ошибка';
    }
}



echo render(TEMPLATES_DIR . 'index.tpl', [
        'title' => 'Создание товара',
        'css' => CSS,
        'menu' => addMenu($menu),
        'h1' => 'Добавление товара',
        'login' => choiceIcon(),
        'content' => render(TEMPLATES_DIR . 'product/createProduct.tpl')
]);