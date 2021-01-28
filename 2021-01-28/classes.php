<?php

class Article {

    public $author;
    public $shortContent;
    public $content;
    public $publishDate;
    public $type;
    public $title;
    public $preview;

    public function __construct($row) {
        $this->title = $row['title'];
        $this->author = $row['author'];
        $this->shortContent = $row['shortContent'];
        $this->content = $row['content'];
        $this->publishDate = $row['publishDate'];
        $this->type = $row['type'];
        $this->preview = $row['preview'];
    }

}

class ShortArticle extends Article {

    public function printArticle() {
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
    }

}

class NewsArticle extends Article {

    public function printArticle() {
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
    }

}

class PhotoArticle extends Article {

    public function printArticle() {
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
    }
    
    public function returnImage() {
        echo '<br><img src=' . $this->preview . ' width="200" >';
    }

}
