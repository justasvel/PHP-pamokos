<?php

if (isset($_POST['submit'])) {
    $link = mysqli_connect('localhost', 'root', '', 'articles');

    if (mysqli_errno($link)) {
        $errors = mysqli_connect_error();
    }

    //Set all variables
    $author = $_POST['author'];
    $shortContent = $_POST['short-content'];
    $content = $_POST['content'];
    $publishDate = $_POST['publish-date'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $addDate = $_POST['add-date'];
    $preview = $_POST['preview'];

    //Isjungti automatini uzklausu patvirtinimas
    mysqli_autocommit($link, 0);
    
    //Begin transaction
    mysqli_begin_transaction($link);

    //Get data for all articles
    $sqlArticle = "SELECT * FROM articles";
    $result = mysqli_query($link, $sqlArticle);

    //Push all articles into an array
    while ($row = $resultArray = mysqli_fetch_array($result)) {
        $articles[] = $row;
    }

    //Set count to check if there are matching short-content values with any of the articles
    $count = 0;

    foreach ($articles as $article) {
        if ($article['shortContent'] == $_POST['short-content']) {
            $count += 1;
        }
    }

    if ($count == 0) {
        $sqlInsert = "INSERT INTO articles (author, shortContent, content, publishDate, type, title, addDate, preview) "
                . "VALUES ('$author', '$shortContent', '$content', '$publishDate', '$type', '$title', '$addDate', '$preview')";

        mysqli_query($link, $sqlInsert);
        echo $count;
    } else if ($count > 0) {
        mysqli_rollback($link);
        echo 'Article with this short content already exists. Try again.';
    }

    mysqli_commit($link);
}