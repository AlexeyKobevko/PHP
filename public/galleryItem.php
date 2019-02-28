<?php
require_once __DIR__ . '/../config/config.php';

$id= isset($_GET['id']) ? $_GET['id'] : false;

if (!$id) {
    echo 'id не определён';
    die;
}
$sql = "SELECT * FROM `images`";
$image = showBigImage($sql, $id);
$count = showCount($sql, $id);

echo render(TEMPLATES_DIR . 'galleryItem.tpl', [
    'title' => 'Море',
    'CSS' => CSS,
    'image' => $image,
    'count' => "Просмотров: $count"
]);