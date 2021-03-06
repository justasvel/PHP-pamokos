<?php

class Article {

    public $author;
    public $shortContent;
    public $content;
    public $publishDate;
    public $addDate;
    public $type;
    public $title;
    public $preview;
    public $id;

    public function __construct($row) {
        $this->title = $row['title'];
        $this->author = $row['author'];
        $this->shortContent = $row['shortContent'];
        $this->content = $row['content'];
        $this->publishDate = $row['publishDate'];
        $this->type = $row['type'];
        $this->preview = $row['preview'];
        $this->id = $row['id'];
        $this->addDate = $row['addDate'];
    }

}

class ShortArticle extends Article {

    public function printArticle() {
        echo '<div>';
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<p style="font-size: 12px;color: red;"> Updated: ' . $this->addDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
        echo '</div>';
    }

    public function commentButton() {
        echo "<a class='btn' href='articleManagement/commentArticle.php?id=$this->id'> Leave Comment </a>";
    }

    public function deleteButton() {
        echo "<a class='btn' href='articleManagement/deleteArticle.php?id=$this->id'> Delete Article </a>";
    }

    public function printLink() {
        echo "<br><a href='viewArticle.php?id=$this->id'> Peržiūrėti visą straipsnį </a>";
        echo '<hr>';
    }

}

class NewsArticle extends Article {

    public function printArticle() {
        echo '<div>';
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<p style="font-size: 12px;color: red;"> Updated: ' . $this->addDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
        echo '</div>';
    }

    public function printLink() {
        echo "<br><a href='viewArticle.php?id=$this->id'> Peržiūrėti visą straipsnį </a>";
        echo '<hr>';
    }

    public function commentButton() {
        echo "<a class='btn' href='articleManagement/commentArticle.php?id=$this->id'> Leave Comment </a>";
    }

    public function deleteButton() {
        echo "<a class='btn' href='articleManagement/deleteArticle.php?id=$this->id'> Delete Article </a>";
    }

}

class PhotoArticle extends Article {

    public function printArticle() {
        echo '<div>';
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<p style="font-size: 12px;color: red;"> Updated: ' . $this->addDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
        echo '</div>';
    }

    public function printLink() {
        echo "<br><a href='viewArticle.php?id=$this->id'> Peržiūrėti visą straipsnį </a>";
        echo '<hr>';
    }

    public function printPreview() {
        echo '<img style="display: block;" src="' . $this->preview . '" width="200">';
    }

    public function commentButton() {
        echo "<a class='btn' href='articleManagement/commentArticle.php?id=$this->id'> Leave Comment </a>";
    }

    public function deleteButton() {
        echo "<a class='btn' href='articleManagement/deleteArticle.php?id=$this->id'> Delete Article </a>";
    }

}