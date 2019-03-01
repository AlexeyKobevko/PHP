<?php

function getImages()
{
    $sql = "SELECT * FROM `images` ORDER BY `images`.`views` DESC";
    return getAssocResult($sql);
}

function getImage($id)
{
    $sql = "SELECT * FROM `images` WHERE `id` = $id";
    return show($sql);
}

function updateViews($id, $views = false)
{
    $viewsString = $views ? (int)$views : '`views` + 1';
    $sql = "UPDATE `images` SET `views` = $viewsString WHERE `id` = $id";
    return execQuery($sql);
}

function createGallery()
{
    $result = '';
    $images = getImages();

    foreach ($images as $image) {
        if (is_file(WWW_DIR . $image['url'])) {
            $result .= render(TEMPLATES_DIR . 'gallery.tpl', $image);
        }
    }
    return $result;
}

function showImage($id)
{
    $image = getImage($id);

    if (!$image){
        return '404';
    }

    updateViews($id);
    $image['views']++;

    return render(TEMPLATES_DIR . 'galleryItem.tpl', $image);
}

//function createGallery()
//{
//    $db = createConnection();
//    $sql = "SELECT * FROM `images` ORDER BY `images`.`views` DESC";
//    $images = getAssocResult($sql);
//    $result = '';
//    foreach ($images as $image) {
//        $result .= '<a href="/galleryItem.php?id=' . $image['id'] . '">' .
//            '<img class="small" src="' . $image['url'] . '">' .
//            '</a>';
//    }
//    mysqli_close($db);
//    return $result;
//}

//function showBigImage($sql, $id)
//{
//    $result = '';
//    $images = getAssocResult($sql);
//    if (empty($images)) {
//        return null;
//    }
//    foreach ($images as $image) {
//        if ($image['id'] == $id) {
//            $result = '<img src="' . $image['full_url']  .'" class="big">';
//        }
//    }
//    return $result;
//}

//function showCount($sql, $id)
//{
//    $result = '';
//    $images = getAssocResult($sql);
//    if (empty($images)) {
//        return null;
//    }
//    foreach ($images as $image) {
//        if ($image['id'] == $id) {
//            $result = $image['views'];
//        }
//    }
//    return $result;
//}