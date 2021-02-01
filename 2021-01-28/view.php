<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Articles</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">

    </head>

    <body>
        <?php
        require 'data.php';

        if (isset($errors)) {
            echo $errors;
            exit();
        }

        foreach ($publications as $pub) {
            echo $pub->printArticle();
            echo $pub->printLink();
        }
        ?>
        <h3>Add new Article:</h3>
        <form method="POST" action="addarticle.php">
            <div>
                <label>Author</label>
                <p><input type="text" placeholder="Author..." name="author"></p>
            </div>
            <div>
                <label>Short Content</label>
                <p><input type="text" placeholder="Short Content..." name="short-content"></p>
            </div>
            <div>
                <label>Content</label>
                <p><textarea type="content" placeholder="Enter Content..." name="content" rows="4" cols="50"></textarea></p>
            </div>
            <div>
                <label>Publish date</label>
                <p><input type="date" name="publish-date"></p>
            </div>
            <div>
                <label>Type</label>
                <p><input type="text" name="type" placeholder="Enter type..."></p>
            </div>
            <div>
                <label>Title</label>
                <p><input type="text" name="title" placeholder="Enter title..."></p>
            </div>
            <div>
                <label>Add date</label>
                <p><input type="date" name="add-date" placeholder="Todays date..."></p>
            </div>
            <div>
                <label>Add preview</label>
                <p><input type="text" name="preview" placeholder="Preview..."></p>
            </div>


            <input type="submit" value="Add new Article to the list" name="submit">
        </form>
    </body>
</html>