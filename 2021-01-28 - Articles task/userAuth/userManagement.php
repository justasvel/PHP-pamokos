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
        require('config.php');

        $sqlSelectUsers = "SELECT * FROM users";

        $results = mysqli_query($link, $sqlSelectUsers);
        
        $row= mysqli_fetch_array($results);


        foreach ($results as $result) {
            $users[] = $result;
        }

        foreach ($users as $user) {
            $userId = $user['id'];
            if ($user['usertype'] !== 'administrator') {
                echo 'User id: ' . $user['id'] . '.<br>';
                if ($user['usertype'] == 'deleted') {
                    echo 'Username: ' . $user['username'] . ' - This user is deleted. (You can delete his remaining articles or comments)<br>';
                    echo "<a class='btn' href='deleteComments.php?id=$userId'> Delete users comments </a><br>";
                    echo "<a class='btn' href='deleteArticles.php?id=$userId'> Delete users articles </a><br>";
                    echo "<a class='btn' href='deleteAllInfo.php?id=$userId'> Delete all users info </a><br>";
                    echo '<hr><br>';
                } else {
                    echo 'Username: ' . $user['username'] . '<br>';
                    echo "<a class='btn' href='deleteUser.php?id=$userId'> Delete only user </a><br>";
                    echo "<a class='btn' href='blockUser.php?id=$userId'> Block User </a><br>";
                    echo "<a class='btn' href='deleteComments.php?id=$userId'> Delete users comments </a><br>";
                    echo "<a class='btn' href='deleteArticles.php?id=$userId'> Delete users articles </a><br>";
                    echo "<a class='btn' href='deleteAllInfo.php?id=$userId'> Delete all users info </a><br>";
                    echo '<hr><br>';
                }
            }
        }
        ?>





    </body>
</html>

