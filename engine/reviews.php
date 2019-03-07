<?php

function getReviews()
{
    $sql = "SELECT * FROM `reviews` ORDER BY `date` DESC";
    return getAssocResult($sql);
}

function insertReview($author, $comment)
{
    $db = createConnection();
    $author = escapeString($db, $author);
    $comment = escapeString($db, $comment);

    $sql = "INSERT INTO `reviews`(`author`, `comment`) VALUES ('$author', '$comment')";

    return execQuery($sql, $db);
}