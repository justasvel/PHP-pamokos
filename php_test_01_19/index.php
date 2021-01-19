<?php

class Code {

    private $array;

    function __construct($array) {
        $this->array = $array;
    }

    function getArray() {
        echo '<pre>';
        print_r($this->array) . '<br>';
        echo '</pre>';
    }

    function makeSecondBinary() {
        (array_splice($this->array, 1, 1, decbin($this->array[1])));
    }

    function makeSecondOcatal() {
        (array_splice($this->array, 1, 1, decoct($this->array[1])));
    }

    function makeSecondHexadecimal() {
        (array_splice($this->array, 1, 1, dechex($this->array[1])));
    }

    function makeReverseThirdBinary() {
        (array_splice($this->array, count($this->array) - 3, 1, decbin($this->array[1])));
    }

    function makeReverseThirdOctal() {
        (array_splice($this->array, count($this->array) - 3, 1, decoct($this->array[1])));
    }

    function makeReverseThirdHexadecimal() {
        (array_splice($this->array, count($this->array) - 3, 1, dechex($this->array[1])));
    }

}

$randomArr = [1, 2, 3, 4, 5, 6, 7, 8];

$instanceOfCode = new Code($randomArr);
$instanceOfCode->makeReverseThirdBinary();
$instanceOfCode->getArray();

