<?php

namespace App\VehicleTypes;

use App\Vehicle;
use App\VehicleFeatures\Flyable;

class Helicopter extends Vehicle implements Flyable
{
    public function move()
    {
        // TODO: Implement move() method.
    }

    public function refuel()
    {
        // TODO: Implement refuel() method.
    }

    public function fly()
    {
        echo $this->getName() . ' flying like helicopter' . PHP_EOL;
    }

    public function runMove()
    {
        $this->fly();
    }
}