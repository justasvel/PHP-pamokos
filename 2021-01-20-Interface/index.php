<?php

interface Car {
    function maxSpeed();
    function fuelTankSize();
}

interface Ship {
    function numberOfAnchors();
    function crewNumber();
}

class Mercedes implements Car {
    private $maximumSpeed = 260;
    private $tankSize = 70;
    
    function maxSpeed() {
        return $this->maximumSpeed;
    }
    
    function fuelTankSize() {
        return $this->tankSize;
    }
}

class AmphibiousMercedes implements Car, Ship{
    private $tankSize = 90;
    private $maximumSpeed = 200;
    private $crewMembers = 1;
    private $numberOfAnchors = 1;
    
    function fuelTankSize() {
        return $this->tankSize;
    }
    
    function maxSpeed() {
        return $this->maximumSpeed;
    }
    
    function numberOfAnchors() {
        return $this->numberOfAnchors;
    }
    
    function crewNumber() {
        return $this->crewMembers;
    }
}