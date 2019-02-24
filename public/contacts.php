<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../data/menu.php';

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Контакты',
    'h1' => 'Контакты',
    'menu' => addMenu($menu),
    'content' => render(TEMPLATES_DIR . 'contacts.tpl')
]);