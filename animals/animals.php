<?php

abstract class Animals {

    protected $weight;
    protected $region;

    function getWeight() {
        return $this->weight;
    }
    
    function getRegion() {
        return $this->region;
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

    function __construct($weight, $region) {
        $this->weight = $weight;
        $this->region = $region;
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

    function __construct($weight, $region) {
        $this->weight = $weight;
        $this->region = $region;
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

class Rabbit extends Herbivores {

    function __construct($weight, $region) {
        $this->weight = $weight;
        $this->region = $region;
    }

}

class Lion extends Carnivores {

    function __construct($weight, $region) {
        $this->weight = $weight;
        $this->region = $region;
    }

}

class Grass {

    private $weight;
    private $region;

    function __construct($weight, $region) {
        $this->weight = $weight;
        $this->region = $region;
    }

    function getWeight() {
        return $this->weight;
    }
    
    function getRegion() {
        return $this->region;
    }

}

// $lion = new Lion(200, 'Gabon');
// $rabit = new Rabit(20, 'Nigeria');
// $grass = new Grass(0.1, 'Canada');
// $shark = new Shark(500, 'Atlantic Ocean');
// $tuna = new Tuna(100, 'Pacific Ocean');


// $lion->eats($rabit);
// $rabit->eats($lion);
// $rabit->eats($grass);

// $tuna->eats($grass);
// $shark->eats($tuna);