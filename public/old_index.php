<?php
class Vehicle
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function move()
    {
        if($this->name == 'bmw' || $this->name == 'kamaz' || $this->name == 'harley-davidson')
            echo $this->name . ' moveing';
    }
	public function stop() {
		echo $this->name . ' stopped';
	}
    public function musicOn()
    {
        echo $this->name . ' music switched on';
    }
    public function takeOff()
    {
        echo $this->name . ' took off';
    }
    public function landing()
    {
        echo $this->name . ' landing';
    }
    public function fly()
    {
        echo $this->name . ' flying';
    }
    public function swim()
    {
        echo $this->name . ' swimming';
    }
	public function emptyLoads($object) 
	{
		echo $this->name . ' refuel' . $object;
	}
	public function refuel($object) 
	{
		echo $this->name . ' refuel' . $object;
	}
}
$vehicles = [
    new Vehicle('bmw'), new Vehicle('boat'), new Vehicle('helicopter'), new Vehicle('kamaz')
];
foreach($vehicles as $vehicle) {
    switch($vehicle->name)
    {
        case 'bmw':
            $vehicle->move();
            $vehicle->musicOn();
            break;
        case 'boat':
            $vehicle->move();
            $vehicle->swim();
            break;
        case 'helicopter':
            $vehicle->takeOff();
            $vehicle->fly();
            $vehicle->landing();
            break;
        case 'kamaz':
        	$vehicle->move();
			$vehicle->stop();
            $vehicle->emptyLoads();
            break;
    }
	$vehicle->stop();
    $vehicle->refuel('gas');
}