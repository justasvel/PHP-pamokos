<?php

require 'classes.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=articles;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT `author`, `shortContent`, `content`, `publishDate`, `type`, `title`, `preview` FROM articles ORDER BY `type`, `publishDate` DESC';
    $results = $pdo->query($sql);
    
    foreach ($results as $result) {
        $publications[] = new $result['type']($result);
    }
    
    include __DIR__ . '/view.php';
    
} catch (PDOException $e) {
    $error = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    echo $error;
}