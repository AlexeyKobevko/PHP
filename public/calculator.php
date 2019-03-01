<?php

require_once __DIR__ . '/../config/config.php';

$firstArgument = $_POST['a'] ?? 'error';
$secondArgument = $_POST['b'] ?? 'error';
$operator = $_POST['operations'] ?? 'yt';
$result = mathOperations($firstArgument, $secondArgument, $operator);

$x = $_POST['x'] ?? 'error';
$y = $_POST['y'] ?? 'error';
$operator2 = $_POST['operator2'] ?? 'yt';
$result2 = mathOperations($x, $y, $operator2);

echo render(TEMPLATES_DIR . 'index.tpl', [
    'menu' => addMenu($menu),
    'title' => 'Калькулятор',
    'h1' => 'Калькулятор',
    'css' => CSS,
    'content' => render(TEMPLATES_DIR . 'calculator.tpl', [
        'result' => $result,
        'result2' => $result2
    ])
]);