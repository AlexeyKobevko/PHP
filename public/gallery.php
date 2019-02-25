<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../data/menu.php';

$images = [
    '/img/img1.jpg',
    '/img/img2.jpg',
    '/img/img3.jpg',
    '/img/img4.jpg',
    '/img/img5.png'
];

echo render(TEMPLATES_DIR . 'index.tpl', [
   'title' => 'Галерея',
   'h1' => 'Галерея',
    'menu' => addMenu($menu),
    'styles' => CSS,
    'content' => render(TEMPLATES_DIR . 'gallery.tpl', [
        'gallery' => addImages()
    ])
]);
