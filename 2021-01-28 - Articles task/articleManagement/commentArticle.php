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
    $userId = $_SESSION['id'];
    
    $sql = "INSERT INTO comments (comment, user, article_id, user_id)"
            . "VALUES ('$comment', '$username', '$articleId', '$userId')";
    
    mysqli_query($link, $sql);
    header('Location: ../view.php');
} else {
    header('Location: ../view.php');
}