<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Article comment</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">

        <link rel="stylesheet" href="css/styles.css?v=1.0">

    </head>

    <body>
        <form method="POST" action="commentArticle.php">
            <label for="comment">Leave a comment: </label>
            <p><textarea id="comment" name="comment" rows="4" cols="50"></textarea></p>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="submit" name="submit" value="Leave comment">
        </form>
    </body>
</html>