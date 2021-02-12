<?php

if (isset($_GET['id'])) {
    require('config.php');
    $id = $_GET['id'];
    $deleteUsersComments = "DELETE FROM comments WHERE user_id = '$id'";
    
    mysqli_query($link, $deleteUsersComments);
    header('Location: ../view.php');
} else {
    header('Location: userManagement.php');
}