<?php

class Ninja {
    public function add($firstNumber, $amount) {
        return $firstNumber + $amount;
    }

    public function subtract($firstNumber, $amount) {
        return $firstNumber - $amount;
    }

}

class Employee extends Ninja {
    private $department;
    private $salary = 1000;

    public function changeDepartment($newDepartment) {
        $this->department = $newDepartment;
    }

    public function increaseSalary($amount) {
        echo $this->salary + $amount;
    }

}

interface NinjaInterface {
    function stealthStatus($status);
}

class EmployeeNinja extends employee implements NinjaInterface {
    function stealthStatus($status) {
        echo $status;
    }
}

$ninjaEmployee = new EmployeeNinja();

$ninjaEmployee->increaseSalary(200);
$ninjaEmployee->stealthStatus('true');