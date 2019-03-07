<?php

require_once __DIR__ . '/../config/config.php';

$id= isset($_GET['id']) ? $_GET['id'] : false;
$id = (int)$id;

if (!$id) {
    echo 'id не определён';
    exit();
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => "Картинка $id",
    'h1' => "Картинка $id",
    'css' => CSS,
    'menu' => addMenu($menu),
    'content' => showImage($id)
]);
//echo render(TEMPLATES_DIR . 'galleryItem.tpl', [
//    'title' => 'Море',
//    'CSS' => CSS,
//    'image' => $image,
//    'count' => "Просмотров: $count"
//]);