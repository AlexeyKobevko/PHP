<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_SESSION['login'])) {
    header('Location: /login.php');
}

$user_id = (int)$_SESSION['login']['id'];

if(empty($_COOKIE['cart'])) {
    echo 'Корзина пуста';
    exit();
}

$sql = "INSERT INTO `orders` (`user_id`) VALUES ('$user_id')";

$orderId = insert($sql);

if(!$orderId) {
    echo 'Произошла ошибка';
    exit();
}

$values = [];
foreach ($_COOKIE['cart'] as $productId => $amount) {
    $productId = (int)$productId;
    $amount = (int)$amount;
    $values[] = "($orderId, $productId, $amount)";
}
$values = implode(', ', $values);
$sql = "INSERT INTO `orders_products` (`order_id`, `product_id`, `amount`) VALUES $values";

if(execQuery($sql)) {
    echo 'Заказ успешно создан';
    //очищаем куки корзины
    foreach ($_COOKIE['cart'] as $productId => $amount) {
        setcookie("cart[$productId]", null, -1, '/');
    }
    header('Location: /myOrders.php');
} else {
    echo 'Произошла ошибка';
}



