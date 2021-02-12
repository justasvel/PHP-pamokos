<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Articles</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">
        <style>
            .btn {
                display:inline-block;
                text-decoration: none;
                color: white;
                padding: 2px;
                background: gray;
                border-radius: 5px;
                margin: 10px 0;
            }
        </style>

    </head>

    <body>
        <?php
        session_start();
        require 'userAuth/userLogOut.php';
        if (isset($_SESSION['loggedin'])) {
            require 'templates/logOut.html.php';
        }

        if ($_SESSION['usertype'] == 'administrator') {
            require 'templates/userManagement.html.php';
        }
        
        require 'data.php';
        require 'userAuth/checkuser.php';
        require 'articleManagement/printComments.php';


        if (isset($errors)) {
            echo $errors;
            exit();
        }
        // Print out all of the articles
        foreach ($publications as $pub) {
            echo $pub->printArticle();

            if ($pub->type == 'PhotoArticle') {
                echo $pub->printPreview();
            }

            if (isset($_SESSION['loggedin'])) {
                authorCheck($pub);
                adminCheck($pub);
                visitorCheck($pub);
            }
            $pub->printLink();
            printComments($pub);
        }
        
        if ($_SESSION['usertype'] == 'author') {
            require('templates/addArticle.html.php');
        }
        ?>


    </body>
</html>