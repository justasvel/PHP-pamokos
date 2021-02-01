<?php

require 'classes.php';

    $link = mysqli_connect('localhost', 'root', '', 'articles');
    
    if (mysqli_error($link) != '') {
        $errors = mysqli_error($link);
    }
    
    $sql = 'SELECT `id`, `author`, `shortContent`, `content`, `publishDate`, `type`, `title`, `preview` FROM articles ORDER BY `type`, `publishDate` DESC';
    
    $results = mysqli_query($link, $sql);
    
    foreach ($results as $result) {
        $publications[] = new $result['type']($result);
    }
    