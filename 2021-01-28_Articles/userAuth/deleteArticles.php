<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require('config.php');
    
    
    $sqlDeleteArticles = "DELETE FROM articles WHERE user_id = '$id'";
    mysqli_query($link, $sqlDeleteArticles);
    header('Location: ../view.php');
    
} else {
    header('Location: userManagement.php');
}