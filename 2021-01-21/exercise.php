<?php

abstract class Shape {

    protected $perimeter;
    protected $area;
    protected $shapeType;
    public $dimensions = ['x' => 0, 'y' => 0];

    public function __toString() {
        return $this->shapeType . ' is a shape';
    }

    public function getDimensions() {
        print_r($this->dimensions);
    }

    public function setDimensions($x, $y) {
        $this->dimensions['x'] = $x;
        $this->dimensions['y'] = $y;
    }

}

class Circle extends Shape {

    public $r;

    public function __construct($r, $shapeType) {
        $this->perimeter = 2 * pi() * $r;
        $this->area = pi() * pow($r, 2);
        $this->shapeType = $shapeType;
        $this->r = $r;
    }

    public function getPerimeter() {
        return $this->perimeter;
    }

    public function getArea() {
        return $this->area;
    }

}

class Rectangle extends Shape {

    public $aSide;
    public $bSide;

    public function __construct($a, $b, $shapeType) {
        $this->perimeter = ($a + $b) * 2;
        $this->area = $a * $b;
        $this->shapeType = $shapeType;
        $this->aSide = $a;
        $this->bSide = $b;
    }

    public function getPerimeter() {
        return $this->perimeter;
    }

    public function getArea() {
        return $this->area;
    }

}

class Square extends Shape {

    public $a;

    public function __construct($a, $shapeType) {
        $this->perimeter = $a * 4;
        $this->area = $a * $a;
        $this->shapeType = $shapeType;
        $this->a = $a;
    }

    public function getPerimeter() {
        return $this->perimeter;
    }

    public function getArea() {
        return $this->area;
    }

}
