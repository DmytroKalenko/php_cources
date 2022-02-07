<?php
class Employee{
    private string $name = '';
    private int $age = 1;
    private int|float $salary = 0;


    public function getAge(): int
    {
        return $this->age;
    }

    public function getSalary(): float|int
    {
        return $this->salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAge(int $age): void
    {
        if($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSalary(float|int $salary): void
    {
        $this->salary = $salary.' $';
    }

    private function isAgeCorrect(int $age): bool{
        if(1<= $age and $age >= 100){
            return true;
        }else return false;
    }
}

$object = new Employee();
echo $object ->getSalary();
