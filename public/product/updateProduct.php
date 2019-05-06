<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;
$id = (int)$id;

if (!$id) {
    echo 'id не определён';
    exit();
}

$product = getProduct($id);

$name = $_POST['name'] ?? '';
$desc = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$image = $_POST['image'] ?? '';

$message ='';

if ($name && $desc && $price) {

    if (!$image) {
        $image = '/img/products/soon.jpg';
    }

    $result = updateProduct($name, $desc, $price, $image, $id);

    if ($result) {
        $message = 'Товар успешно изменён';
    } else {
        $message = 'Произошла ошибка';
    }
}

$product = getProduct($id);

echo render(TEMPLATES_DIR . 'index.tpl', [
        'title' => 'Изменение товара',
        'css' => CSS,
        'menu' => addMenu($menu),
        'h1' => 'Изменение товара',
        'login' => choiceIcon(),
        'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
        'content' => render(TEMPLATES_DIR . 'product/updateProduct.tpl', [
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'image' => $product['image'],
            'message' => $message
        ])
]);
