<?php

namespace App\VehicleTypes;

use App\Vehicle;

class Car extends Vehicle
{
    protected $name;

    public function refuel()
    {
        // TODO: Implement refuel() method.
    }

    public function runMove()
    {
        echo $this->name . ' moving' . PHP_EOL;
    }
}