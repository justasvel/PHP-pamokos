<?php

if (isset($_GET['id'])) {
    require('config.php');
    $id = $_GET['id'];
    $changeUserType = "UPDATE users SET usertype = 'deleted' WHERE id = $id";
    
    mysqli_query($link, $changeUserType);
    header('Location: ../view.php');
} else {
    header('Location: userManagement.php');
}