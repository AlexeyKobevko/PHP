<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../data/menu.php';

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Главная',
	'h1' => 'Привет, мир!',
	'content' => 'Я родился',
    'menu' => addMenu($menu)
]);