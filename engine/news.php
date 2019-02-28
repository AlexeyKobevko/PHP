<?php

function getNews()
{
    $sql = "SELECT * FROM `news` ORDER BY `news`.`date_create` DESC";
    return getAssocResult($sql);
}

function renderNews($news)
{
    $newsContent ='';
    foreach ($news as $newsItem) {
        if (empty($newsItem['image'])) {
            $newsItem['image'] = '/img/empty.jpg';
        }
        $newsContent .= render(TEMPLATES_DIR . 'news.tpl', $newsItem);
    }
    return $newsContent;
}