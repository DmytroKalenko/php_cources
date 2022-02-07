<?php

class Employee{
    private string $name = '';
    private string $surname = '';
    private int $salary = 0;

    public function getName():string{
        return $this ->name;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function getSalary(): int
    {
        return $this->salary;
    }
    public function setSalary(int $salary){
        $this ->salary = $salary;
    }
}

