<?php
if(isset($_GET['id'])) {
    require('../templates/comment.html.php');
    $articleId = $_GET['id'];   
} else if (isset($_POST['submit'])) {
    session_start();
    require('../userAuth/config.php');
    
    $comment = $_POST['comment'];
    $username = $_SESSION['username'];
    $articleId = $_POST['id'];
    
    $sql = "INSERT INTO comments (comment, user, article_id)"
            . "VALUES ('$comment', '$username', '$articleId')";
    
    mysqli_query($link, $sql);
    header('Location: ../view.php');
} else {
    header('Location: ../view.php');
}