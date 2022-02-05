<?php

class Employee {
    public $name = '';
    public $age = 0;
    public $salary = 0;

    public function GetName(){
        return $this -> name;
    }

    public function getAge(){
        return $this -> age;
    }

    public function setAge($age){
        if($age > 18){
            $this->age=$age;
        }else{
            return false;
        }
    }

    public function  setSalary($salary){
        $this -> salary = $this -> salary + $salary;
    }

    public function  getSalary(){
        return $this ->salary;
    }


}

$ron = new Employee();
$ron -> setSalary(2500);
$ron -> setSalary(2500);

echo $ron -> getSalary();


$object = new Employee();
$object -> name = 'john';
$object -> age = 20;
echo $object -> GetName();
echo $object -> getAge();
$object -> setAge(19);
echo $object -> getAge();

echo '<br>';


class EmployeeSecond {
    public string $name;
    public string $salary;

    public function doubleSalary(){
        $this->salary=($this->salary*2);
    }
}
$object2 = new EmployeeSecond();
$object2->salary = 334;
echo $object2->salary;
$object2->doubleSalary();
echo $object2->salary;

//task12
class Rectangle{
    public float $width;
    public float $height;
}