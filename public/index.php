<?php

require_once __DIR__ . '/../config/config.php';

$news = getNews();
$newsContent = renderNews($news);

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Новости',
    'h1' => 'Горячие новости',
    'css' => CSS,
    'login' => choiceIcon(),
    'orders' => isAdmin() ? "<a href='/admin/ordersControl.php'>Заказы</a>" : '',
    'content' => $newsContent
]);


