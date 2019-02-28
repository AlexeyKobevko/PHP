<?php

require_once __DIR__ . '/../config/config.php';

//
//echo render(TEMPLATES_DIR . 'index.tpl', [
//	'title' => 'Главная',
//	'h1' => 'Привет, мир!',
//	'content' => 'Я родился',
//    'menu' => addMenu($menu),
//    'CSS' => CSS
//]);

//$login = 'user@user.ru';
//$sql = "INSERT INTO `users`(`name`, `login`, `password`) VALUES ('manager', 'manager@manager.ru', '123123')";
//$row = execQuery($sql);
//var_dump($row);

$news = getNews();
$newsContent = renderNews($news);

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Новости',
    'h1' => 'Горячие новости',
    'css' => CSS,
    'content' => $newsContent
]);
