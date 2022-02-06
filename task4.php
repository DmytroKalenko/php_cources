<?php
class User{
    public int $age = 0;

    public function isAgeCorrect($age):int{
        if(18 <= $age and $age <= 60 ) {
            return true;
        }else{
            return false;
        }
    }

    public function setAge(int $age): void
    {
        if($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    public function addAge(int $age){
        if($this->isAgeCorrect($age)) {
            $this->age=$this->age+$age;
        }
    }

    public function subAge(int $digit){
        $this->age = $this->age - $digit;
    }
}

$object = new User();
$object->setAge(20);
echo $object->age;
echo "<br>";
$object->addAge(35);
echo $object->age;
$object->subAge(5);
echo "<br>";
echo $object->age;


