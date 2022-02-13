<?php

class Employee
{
    public string $name = '';
    public int $age = 0;
    public float $salary = 0;

    public function __construct(string $name, int $age, float|int $salary)
    {
        $this->name=$name;
        $this->age=$age;
        $this->salary=$salary;
    }

    /**
     * @return float|int
     */
    public function getSalary(): float|int
    {
        return $this->salary;
    }
}

$EmployeeFirst = new Employee('eric',25,1000);
$EmployeeSecond = new Employee('Kyle',30,3000);

echo $EmployeeFirst->salary + $EmployeeSecond ->salary;