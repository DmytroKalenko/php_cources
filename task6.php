<?php
class Employee {
    public string $name = '';
    public int $age = 1;
    public int|float $salary = 0;

    public function __construct(string $name, int $age, int|float $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
}

$object = new Employee('eric',25,1000);
$objectSecond = new Employee('kyle',30,2000);

echo $object->salary + $objectSecond->salary.' salary';