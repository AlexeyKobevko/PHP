<?php

function createGallery()
{
    $db = createConnection();
    $sql = "SELECT * FROM `images` ORDER BY `images`.`views` DESC";
    $images = getAssocResult($sql);
    $result = '';
    foreach ($images as $image) {
        $result .= '<a href="/galleryItem.php?id=' . $image['id'] . '">' .
            '<img class="small" src="' . $image['url'] . '">' .
            '</a>';
    }
    mysqli_close($db);
    return $result;
}

function showBigImage($sql, $id)
{
    $result = '';
    $images = getAssocResult($sql);
    if (empty($images)) {
        return null;
    }
    foreach ($images as $image) {
        if ($image['id'] == $id) {
            $result = '<img src="' . $image['full_url']  .'" class="big">';
        }
    }
    return $result;
}

function showCount($sql, $id)
{
    $result = '';
    $images = getAssocResult($sql);
    if (empty($images)) {
        return null;
    }
    foreach ($images as $image) {
        if ($image['id'] == $id) {
            $result = $image['views'];
        }
    }
    return $result;
}