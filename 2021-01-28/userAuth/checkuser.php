<?php
//Check if the article doesn't belong to the author
function authorCheck($pub) {
    if ($_SESSION['usertype'] == 'author') {
        if ($pub->id == $_SESSION['authorArticle']) {
            
        } else {
            $pub->commentButton();
        }
    }
}

function adminCheck($pub) {
    if ($_SESSION['usertype'] == 'administrator') {
        $pub->deleteButton();
    }
}

function visitorCheck($pub) {
    if($_SESSION['usertype'] == 'visitor') {
        $pub->commentButton();
    }
}
