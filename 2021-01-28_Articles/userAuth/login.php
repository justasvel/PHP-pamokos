<?php

// Initialize session
session_start();

//Check if the user is already logged in, if yes redirect him to view.php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: view.php');
}

//Include config file
require('userAuth/config.php');

//Define variables and initialize with empty values
$username = $password = '';
$user_err = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, username, password, usertype, article_id FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            //Store session data
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["usertype"] = $row["usertype"];
            $_SESSION["id"] = $row["id"];

            //Check if user has been deleted or blocked
            if ($_SESSION['usertype'] == 'deleted') {
                $user_err = 'Can\'t login. Your user has been deleted.';
            } else if ($_SESSION['usertype'] == 'blocked') {
                $user_err = 'Can\'t login. Your user has been blocked';
            } else {
                //Check if one of the authors are logged in
                if (isset($row['article_id'])) {
                    $_SESSION['authorArticle'] = $row['article_id'];
                } else {
                    $_SESSION['authorArticle'] = 0;
                }

                //Redirect to view.php page
                header('location: view.php');
            }
        } else {
            $user_err = 'Your Login Name or Password is invalid';
        }
    } else {
        $user_err = 'All fields must be filled in';
    }
}

