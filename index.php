<?php

class User {
    private $name;
    private $lastName;
    static $idNumber = 123;
    
    function __construct($name, $lastName, $id) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->idNumber = $id;
    }
    
    function getName() {
        echo $this->name;
    }
    
    function getLastName() {
        echo $this->lastName;
    }
    
    function getId() {
        echo self::$idNumber;
    }
}

class Account extends User {

    private $balance;
    static public $addLimit = 500;
    static public $requestLimit = 800;

    function __construct($balance) {
        $this->balance = $balance;
    }

    function getBalance() {
        return $this->balance;
    }

    function requestMoney($amount) {
        if ($amount < $this->balance) {
            if ($amount > self::$requestLimit) {
                echo 'Request limit is exceeded. Pick lower amount';
            } else {
                $this->balance = $this->balance - $amount;
            }
        } else {
            echo 'Insuficient funds';
        }
    }
    
    function addMoney ($amount) {
        if ($amount < self::$addLimit) {
            $this->balance = $this->balance + $amount;
        }
    }
}

echo Account::getId() . '<br>';
