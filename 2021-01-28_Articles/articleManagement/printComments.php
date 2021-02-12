<?php

function printComments($pub) {
    //require('userAuth/config.php');
    $link = mysqli_connect('localhost', 'root', '', 'articles');
    $sql = "SELECT comment, user, article_id FROM comments";

    $results = mysqli_query($link, $sql);

    foreach ($results as $result) {
        $comments[] = $result;
    }
    $commentsCount = "SELECT COUNT(comment) FROM comments WHERE article_id = '$pub->id'";
    $GLOBALS['count'] = 0;
    
    if (!empty($comments)) {
        echo '<b> Comments: </b><br>';
        foreach ($comments as $comment) {
            if ($comment['article_id'] == $pub->id) {
                $result = mysqli_query($link, $commentsCount);
                $array = mysqli_fetch_array($result);
                $GLOBALS['count'] = $array['COUNT(comment)'];

                echo '<i>' . $comment['user'] . '</i> - ' . $comment['comment'] . '<br><br>';
            }
        }
        echo  '<p style="font-size: 12px">' . $GLOBALS['count'] . ' comments.</p>';
        echo '<hr>';
    } else {
        echo 'something';
    }
}
