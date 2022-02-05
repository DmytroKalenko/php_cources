<?php

class User{
    private $name = "Vasili";

    public function show()
    {
        return $this->name;
    }

}

$vasil = new User();
echo $vasil ->show();

echo '<br>';

class UserSecond{
    public function Show($name){
        return $name;
    }
}
 $second = new UserSecond;
echo $second -> Show("Robert");