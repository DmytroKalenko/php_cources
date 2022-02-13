<?php

class Student{
    private string $name = '';
    private int $course = 4;

    /**
     * @return int
     */
    public function getCourse(): int
    {
        return $this->course;
    }

    public function transferToNextCourse(){
       if($this->isCorrectCourse()){
           $this->course +=1;
       }
    }

    private function isCorrectCourse():bool{
        if($this->course<5){
            return true;
        }else return false;
    }

}

$antony = new Student();
echo $antony->getCourse();
echo '<br>';
$antony->transferToNextCourse();
echo $antony->getCourse();
echo '<br>';
$antony->transferToNextCourse();
$antony->transferToNextCourse();
echo $antony->getCourse();
echo '<br>';
$antony->transferToNextCourse();
echo $antony->getCourse();