<?php

require 'classes.php';
require 'userAuth/config.php';
    
    $sql = 'SELECT `id`, `author`, `shortContent`, `content`, `addDate`, `publishDate`, `type`, `title`, `preview` FROM articles ORDER BY `type`, `publishDate` DESC';
    
    $results = mysqli_query($link, $sql);
    
    foreach ($results as $result) {
        $publications[] = new $result['type']($result);
    } 