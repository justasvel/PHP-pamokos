<?php

class Article {

    public $author;
    public $shortContent;
    public $content;
    public $publishDate;
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
    }

}

class ShortArticle extends Article {

    public function printArticle() {
        echo '<div>';
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
        echo '</div>';
    }

    public function commentButton() {
        echo '<button>Comment</button>';
    }

    public function deleteButton() {
        echo '<button>Delete</button>';
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
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
        echo '</div>';
    }

    public function printLink() {
        echo "<br><a href='viewArticle.php?id=$this->id'> Peržiūrėti visą straipsnį </a>";
        echo '<hr>';
    }

    public function commentButton() {
        echo '<button>Comment</button>';
    }

    public function deleteButton() {
        echo '<button>Delete</button>';
    }

}

class PhotoArticle extends Article {

    public function printArticle() {
        echo '<div>';
        echo '<h3>' . $this->title . '</h3>';
        echo '<p style="font-size: 10px;">' . $this->author . '</p>';
        echo '<p style="font-size: 10px;">' . $this->publishDate . '</p>';
        echo '<br>' . $this->type;
        echo '<br>' . $this->content;
        echo '</div>';
    }

    public function printLink() {
        echo "<br><a href='viewArticle.php?id=$this->id'> Peržiūrėti visą straipsnį </a>";
        echo '<hr>';
    }

    public function printPreview() {
        echo '<img src="' . $this->preview . '" width="200">';
    }

    public function commentButton() {
        echo '<button>Comment</button>';
    }

    public function deleteButton() {
        echo '<button>Delete</button>';
    }

}
