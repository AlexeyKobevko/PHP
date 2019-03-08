<?php

require_once __DIR__ . '/../config/config.php';

//echo '<pre>';
//var_dump($_POST);
//var_dump($_SESSION);
//echo '</pre>';

//$login = $_POST['login'] ?? '';
//$password = md5($_POST['password'] ?? '');
//
//loginUser($login, $password);

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Авторизиция',
    'h1' => 'Автроизация',
    'css' => CSS,
    'content' => render(TEMPLATES_DIR . 'login.tpl')
]);


