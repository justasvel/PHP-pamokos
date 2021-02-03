<?php
if (isset($_POST['submit'])) {
    require 'userAuth/config.php';
    //Set all variables
    $author = $_POST['author'];
    $shortContent = $_POST['short-content'];
    $content = $_POST['content'];
    $publishDate = $_POST['publish-date'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $addDate = $_POST['add-date'];
    $preview = $_POST['preview'];
    $theme1 = $_POST['theme1'];
    $theme2 = $_POST['theme2'];
    $theme3 = $_POST['theme3'];
    $picture1 = $_POST['picture1'];
    $picture2 = $_POST['picture2'];
    $picture3 = $_POST['picture3'];

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
        //Insert into articles table
        $sqlInsert = "INSERT INTO articles (author, shortContent, content, publishDate, type, title, addDate, preview) "
                . "VALUES ('$author', '$shortContent', '$content', '$publishDate', '$type', '$title', '$addDate', '$preview')";

        mysqli_query($link, $sqlInsert);
        mysqli_commit($link);
        
        //Get the Id of new article
        $sqlGetArticleId = "SELECT id FROM articles WHERE author = '$author' AND shortContent = '$shortContent' AND content = '$content' AND type = '$type'";
        $idResult = mysqli_fetch_array(mysqli_query($link, $sqlGetArticleId));
        $id = $idResult['id'];
        echo $id;
        //Insert themes into database
        $sqlInsertThemes = "INSERT INTO article_themes (article_id, theme1, theme2, theme3)"
                . "VALUES('$id', '$theme1', '$theme2', '$theme3')";

        if(!mysqli_query($link, $sqlInsertThemes)) {
            echo "Error: " . mysqli_error($link);
        }
        //Insert images into databse
        $sqlInsertImages = "INSERT INTO images (straipsnio_id, link)"
                . "VALUES ('$id', '$picture1'),"
                . "('$id', '$picture2'),"
                . "('$id', '$picture3')";
        
        
        if(!mysqli_query($link, $sqlInsertImages)) {
            echo "Error: " . mysqli_error($link);
        }
        echo $id;
        mysqli_commit($link);
        header('Location: view.php');
    } else if ($count > 0) {
        mysqli_rollback($link);
        mysqli_commit($link);
        echo 'Article with this short content already exists. Try again.';
    }
}