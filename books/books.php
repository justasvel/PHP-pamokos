
<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">

        <title></title>

    </head>

    <body>

        <?php

        class BooksList {

            public $list = array();
            public $a;

            public function loadList(String $file) {

                if (!empty($file) && is_file($file)) {

                    $this->a = file($file);

                    foreach ($this->a as $value) {

                        $b = explode(", ", $value);

                        array_push($this->list, trim($b[1]));
                    }
                }
            }

            public function add(String $title) {

                array_push($this->list, $title);
            }

            public function removeByName(String $title) {

                unset($this->list[array_search($title, $this->list)]);
            }

            public function remove(int $index) {

                unset($this->list[$index]);
            }

            public function get(int $index) {

                echo $this->list[$index];
            }

            public function all() {

                echo "<pre>";

                print_r($this->list);

                echo "</pre>";
            }

            public function save(String $file) {

                $this->list = array_values($this->list);

                $openFile = fopen($file, "a+");

                $i = 0;

                foreach ($this->list as $value) {

                    fwrite($openFile, ($i . ", " . $value . "\r\n"));

                    $i++;
                }
            }

        }

        $new = new BooksList();

        $new->loadList('list.txt');

        $new->add('Knygute');
        $new->add('Brisiaus galas');
        $new->remove(11);
        $new->all();
        $new->get(10);
        ?>

    </body>

</html>