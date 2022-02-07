<?php
require_once ('City.php');

$citizens = [
    new City('Berlin',30),
    new City('Amsterdam',23),
    new City('Paris',34),
    new City('London',80),
    new City('NewYork', 80)
];
$count = 0;
foreach ($citizens as $element){
    $count+=$element->population;
}
echo $count;

