<?php

abstract class Animals {

    protected $weight;

    function getWeight() {
        return $this->weight;
    }

    abstract function eats($object);
}

abstract class SwimmingAnimals extends Animals {

    abstract function swims();
}

abstract class Carnivores extends Animals {

    function eats($object) {
        if (get_class($object) == 'Rabit') {
            echo get_class($object) . ' has been eaten. <br>';
            if ($object->getWeight() / $this->weight < 0.01) {
                echo get_class($this) . ' is not full. <br>';
            }
            $this->weight += $object->getWeight();
        } else {
            echo get_class($object) . ' is inedible';
        }
    }

}

abstract class Herbivores extends Animals {

    function eats($object) {
        if (get_class($object) == 'Grass') {
            echo get_class($object) . ' has been eaten. <br>';
            if ($object->getWeight() / $this->weight < 0.01) {
                echo get_class($this) . ' is not full. <br>';
            }
            $this->weight += $object->getWeight();
        } else if (get_class($object) == 'Lion') {
            $object->eats($this);
        } else {
            echo get_class($object) . ' is inedible. <br>';
        }
    }

}

class Shark extends SwimmingAnimals {

    function __construct($weight) {
        $this->weight = $weight;
    }

    function eats($object) {
        if (get_class($object) == 'Tuna') {
            echo get_class($object) . ' has been eaten. <br>';
            if ($object->getWeight() / $this->weight < 0.01) {
                echo get_class($this) . ' is not full. <br>';
            }

            $this->weight += $object->getWeight();
        } else {
            echo get_class($object) . ' is indedible. <br>';
        }
    }

    function swims() {
        echo 'Swims. <br>';
    }

}

class Tuna extends SwimmingAnimals {

    function __construct($weight) {
        $this->weight = $weight;
    }

    function eats($object) {
        if (get_class($object) == 'Grass') {
            echo get_class($object) . ' has been eaten. <br>';
            if ($object->getWeight() / $this->weight < 0.01) {
                echo get_class($this) . ' is not full. <br>';
            }

            $this->weight += $object->getWeight();
        } else if (get_class($object) == 'Shark') {
            echo get_class($this) . ' has been eaten. <br>';
        } else {
            echo get_class($object) . ' is inedible. <br>';
        }
    }
    
    function swims() {
        echo 'Swims <br>';
    }

}

class Rabit extends Herbivores {

    function __construct($weight) {
        $this->weight = $weight;
    }

}

class Lion extends Carnivores {

    function __construct($weight) {
        $this->weight = $weight;
    }

}

class Grass {

    private $weight;

    function __construct($weight) {
        $this->weight = $weight;
    }

    function getWeight() {
        return $this->weight;
    }

}

$lion = new Lion(200);
$rabit = new Rabit(20);
$grass = new Grass(0.1);
$shark = new Shark(500);
$tuna = new Tuna(100);


//$lion->eats($rabit);
//$rabit->eats($lion);
//$rabit->eats($grass);

//$tuna->eats($grass);
//$shark->eats($tuna);