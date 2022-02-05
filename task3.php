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

//task12,13,14
class Rectangle{
    public float $firstSide;
    public float $secondSide;
    public float $width;
    public float $height;
    public function getSquare():float{
        return $this->width * $this->height;
    }
    public function  getPerimeter():float{
        return 2 * ($this->firstSide + $this->secondSide);
    }
}

echo '<br>';
$figure = new Rectangle();
$figure->firstSide = 3;
$figure->secondSide = 5;
$figure->height = 2;
$figure->width = 5.4;
echo $figure->getPerimeter() .' Perimeter';
echo '<br>';
echo $figure->getSquare() .' Square';
