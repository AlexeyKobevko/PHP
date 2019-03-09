<?php

require_once __DIR__ . '/../config/config.php';

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Авторизиция',
    'h1' => 'Автроизация',
    'css' => CSS,
    'content' => render(TEMPLATES_DIR . 'login.tpl')
]);


