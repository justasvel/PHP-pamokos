<?php

function printComments($pub) {
    //require('userAuth/config.php');
    $link = mysqli_connect('localhost', 'root', '', 'articles');
    $sql = "SELECT comment, user, article_id FROM comments";

    $results = mysqli_query($link, $sql);

    foreach ($results as $result) {
        $comments[] = $result;
    }

    echo '<b>Komentarai: </b><br>';
    foreach ($comments as $comment) {
        if ($comment['article_id'] == $pub->id) {
            echo '<i>' . $comment['user'] . '</i> - ' . $comment['comment'] . '<br>';
        }
    }
    echo '<hr>';
}

