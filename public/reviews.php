<?php

require_once __DIR__ . '/../config/config.php';

$author = $_POST['author'] ?? '';
$comment = $_POST['comment'] ?? '';

if ($author && $comment) {
    $result = insertReview($author, $comment);

    if ($result) {
        echo 'Отзыв добавлен';
        $author = '';
        $comment = '';
    } else {
        echo 'Произошла ошибка';
    }
}
echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Отзывы',
    'menu' => addMenu($menu),
    'h1' => 'Отзывы',
    'css' => CSS,
    'content' => render(TEMPLATES_DIR . 'reviewsForm.tpl', [
        'author' => $author,
        'comment' => $comment
    ])

]);


$reviews = getReviews();

foreach ($reviews as $review) {
    echo render(TEMPLATES_DIR . 'reviews.tpl', $review);
}


