<?php

require_once __DIR__ . '/../config/config.php';

echo     render(TEMPLATES_DIR . 'index.tpl', [
        'menu' => addMenu($menu),
        'title' => 'Корзина',
        'h1' => 'Корзина',
        'css' => CSS,
        'login' => choiceIcon(),
        'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
        'content' => renderProductsCart($_COOKIE['cart'] ?? []),
        'button' => empty($_SESSION['login'])
            ? '<a href="/login.php">Войти</a>'
            : '<a href="/product/createOrder.php"><button>Оформить заказ</button></a>'
    ]);