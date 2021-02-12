<?php
session_start();
if(isset($_GET['id'])) {
    require('config.php');

    $userID = $_GET['id'];
    
    $sqlDeleteArticles = "DELETE FROM articles WHERE user_id = '$userID'";
    $sqlDeleteComments = "DELETE FROM comments WHERE user_id = '$userID'";
    $sqlDeleteArticleThemes = "DELETE FROM article_themes WHERE user_id = '$userID'";
    $sqlDeleteImages = "DELETE FROM images WHERE user_id = '$userID'";
    $sqlDeleteUsers = "DELETE FROM users WHERE id = '$userID'";
    
    mysqli_query($link, $sqlDeleteArticles);
    mysqli_query($link, $sqlDeleteComments);
    mysqli_query($link, $sqlDeleteArticleThemes);
    mysqli_query($link, $sqlDeleteImages);
    mysqli_query($link, $sqlDeleteUsers);
    
    header('Location: ../view.php');
} else {
    header('Location: userManagement.php');
}