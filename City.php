<?php

class City
{
    public string $name;
    public int $population;

    public function __construct($name, $population)
    {
        $this->name = $name;
        $this->population = $population;
    }
}