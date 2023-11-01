<?php

class Animal
{
    public $tail = 1;
    public $legs = 1;

    public function getOne()
    {
        return 1;
    }
}

$animal1 = new Animal();
echo $animal1->getOne();