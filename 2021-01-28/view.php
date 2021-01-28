<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>The HTML5 Herald</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">

    </head>

    <body>
        <?php foreach($publications as $pub): ?>
        <div>
            <?= $pub->printArticle(); 
                if (get_class($pub) == 'PhotoArticle') {
                    $pub->returnImage();
                };
        ?>
        </div>
        <hr>
        <?php endforeach; ?>
    </body>
</html>

