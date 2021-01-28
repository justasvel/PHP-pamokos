<?php

if (isset($_POST['submit'])) {
    require_once 'animals.php';


    if ($_POST['animal'] == 'Grass') {
        $grass = new Grass($_POST['grass-weight'], $_POST['grass-region']);

        echo get_class($grass) . ' object has been created';
    } else if ($_POST['animal'] == 'Carnivore') {

        if ($_POST['carnivore-select'] == 1) {
            $shark = new Shark($_POST['carnivore-weight'], $_POST['carnivore-region']);
            echo get_class($shark) . ' object has been created';
        } else if ($_POST['carnivore-select'] == 2) {
            $lion = new Lion($_POST['carnivore-weight'], $_POST['carnivore-region']);
            echo get_class($lion) . ' object has been created';
        }
    } else if ($_POST['animal'] == 'Herbivore') {

        if ($_POST['herbivore-select'] == 1) {
            $rabbit = new Rabbit($_POST['herbivore-weight'], $_POST['herbivore-region']);
            echo get_class($rabbit) . ' object has been created';
        } else if ($_POST['herbivore-select'] == 2) {
            $tuna = new Tuna($_POST['herbivore-weight'], $_POST['herbivore-region']);
            echo get_class($tuna) . ' object has been created';
        }
    }
} else {
    echo 'Klaida';
}


