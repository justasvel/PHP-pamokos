<?php
if(isset($_GET['id'])) {
    require '../userAuth/config.php';
    
    $sql = "DELETE FROM articles WHERE id =".$_GET['id'];
    
    mysqli_query($link, $sql);
    header('Location: ../view.php');
} else {
    header('Location: ../view.php');
}