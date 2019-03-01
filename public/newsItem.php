<?php



$id= isset($_GET['id']) ? $_GET['id'] : false;

if (!$id) {
    echo 'id не определён';
    die;
}

