<?php

// Check if user clicked on logout button
if (isset($_POST['log-out'])) {
    session_start();

    //Unset all of the session variables
    $_SESSION = array();

    //Destroy the session
    session_destroy();

    //Redirect to login page
    header('location: index.php');
    exit();
}