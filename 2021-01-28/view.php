<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Articles</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">

    </head>

    <body>
        <?php
        require 'userAuth/userLogOut.php';
        require 'templates/logOut.html.php';
        require 'data.php';

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

            echo $pub->printLink();
        }
        ?>

        <h3>Add new Article:</h3>
        <form method="POST" action="addarticle.php">
            <div>
                <label>Author</label>
                <p><input type="text" placeholder="Author..." name="author" required></p>
            </div>
            <div>
                <label>Short Content</label>
                <p><input type="text" placeholder="Short Content..." name="short-content" required></p>
            </div>
            <div>
                <label>Content</label>
                <p><textarea type="content" placeholder="Enter Content..." name="content" rows="4" cols="50" required></textarea></p>
            </div>
            <div>
                <label>Publish date</label>
                <p><input type="date" name="publish-date" required></p>
            </div>
            <div>
                <label>Type</label>
                <p>
                    <select name="type">
                        <option value="NewsArticle">NewsArticle</option>
                        <option value="ShortArticle">ShortArticle</option>
                        <option value="PhotoArticle">NewsArticle</option>
                    </select>
                </p>
            </div>
            <div>
                <label>Title</label>
                <p><input type="text" name="title" placeholder="Enter title..." required></p>
            </div>
            <div>
                <label>Add date</label>
                <p><input type="date" name="add-date" placeholder="Todays date..." required></p>
            </div>
            <div>
                <label>Add preview</label>
                <p><input type="url" name="preview" placeholder="Preview..." required></p>
            </div>
            <div>
                <label>Picture 1</label>
                <p><input type="url" name="picture1" placeholder="Preview..." required></p>
            </div>
            <div>
                <label>Picture 2</label>
                <p><input type="url" name="picture2" placeholder="Preview..." required></p>
            </div>
            <div>
                <label>Picture 3</label>
                <p><input type="url" name="picture3" placeholder="Preview..." required></p>
            </div>
            <div>
                <label>Theme 1</label>
                <p><input type="text" name="theme1" placeholder="Preview..." required></p>
            </div>
            <div>
                <label>Theme 2</label>
                <p><input type="text" name="theme2" placeholder="Preview..." required></p>
            </div>
            <div>
                <label>Theme 3</label>
                <p><input type="text" name="theme3" placeholder="Preview..." required></p>
            </div>
            <input type="submit" value="Add new Article to the list" name="submit">
        </form>
    </body>
</html>