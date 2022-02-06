<?php
class Student{
    private string $name ='';
    public int $course = 1;

    public function transferToNextCourse(){
        if($this->isCourseCorrect()){
            $this->course=$this->course+1;
        }
    }

    private function isCourseCorrect():int{
        if($this->course <= 5){
            return true;
        }else return false;
    }
}

$object = new Student();
echo $object-> course." course";
$object->transferToNextCourse();
echo $object-> course." course";
