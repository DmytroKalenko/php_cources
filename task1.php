<?php

class Employee{
    public $name;
    public $age;
    public $salary;
}

$daria = new Employee;
$daria ->name = 'Daria';
$daria -> age = 22;
$daria ->salary = 1000;

$dmytro = new Employee;
$dmytro -> name = 'Dmytro';
$dmytro -> age = 27;
$dmytro -> salary = 2000;

echo $daria ->salary;
echo '<br>';
echo $dmytro ->salary;
echo '<br>';
echo $daria -> age + $dmytro -> age;
