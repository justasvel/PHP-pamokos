<?php

require 'classes.php';

$link = mysqli_connect('localhost', 'root', '', 'articles');

if (mysqli_connect_errno($link)) {
    $error = mysqli_connect_error();
}

if(isset($error)) {
    echo $error;
    exit();
}
//SQL Queries
$sqlImages = "SELECT link FROM images WHERE straipsnio_id =".$_GET['id'];
$sqlArticle = "SELECT `id`, `author`, `shortContent`, `content`, `publishDate`, `addDate`, `type`, `title`, `preview` FROM articles WHERE ID=".$_GET['id'];
$sqlThemes = "SELECT article_id, theme1, theme2, theme3 FROM article_themes WHERE article_id=".$_GET['id'];

//Retrieved data
$articleResult = mysqli_query($link, $sqlArticle);
$imageLinks = mysqli_query($link, $sqlImages);
$allThemes = mysqli_query($link, $sqlThemes);

//Collect all image links
while ($row = mysqli_fetch_array($imageLinks)) {
    $images[] = $row['link']; 
}

//Print article information
$articleData = mysqli_fetch_array($articleResult);
$i = new $articleData['type']($articleData);
$i->printArticle();

//Print out all of the images
foreach($images as $image) {
    echo '<img width="200" src=' . $image . '>';
}

echo '<ul>';
foreach($allThemes as $theme) {
    echo '<li>' . $theme['theme1'] . '</li>';
    echo '<li>' . $theme['theme2'] . '</li>';
    echo '<li>' . $theme['theme3'] . '</li>';
}
echo '</ul>';
