<?php

namespace App;


abstract class Vehicle
{
    protected $musicOn = false;

    protected $name;

    private $parameters;

    protected $availableActions = [
        'move',
        'music'
    ];

    /**
     * Vehicle constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->name = (isset($parameters['name']) && \is_string($parameters['name'])) ? $parameters['name'] : 'No name';
        $this->parameters = $parameters;
        echo $this->getName() . ' created' . PHP_EOL;
    }

    /**
     * @return mixed
     */
    abstract function refuel();

    abstract function runMove();

    /**
     * @param bool $musicOn
     */
    public function runMusic(bool $musicOn)
    {
        $this->musicOn = $musicOn;
        echo $this->getName() . ' music switched ' . ($this->musicOn ? 'on' : 'off') . PHP_EOL;
    }

    /**
     * @param string $vehicleType
     * @param array $parameters
     * @return mixed
     * @throws \Exception
     */
    public static function create(string $vehicleType, array $parameters = [])
    {
        $className = 'App\\VehicleTypes\\' . $vehicleType;
        if (class_exists($className)) {
            return new $className($parameters);
        } else {
            throw new \Exception("There is no {$vehicleType} vehicle" . PHP_EOL);
        }
    }

    public function actionsRun()
    {
        $configActions = isset($this->parameters['actions']) ? (array)$this->parameters['actions'] : [];

        foreach ($configActions as $action => $actionParams) {
            $actionName  = 'run' . ucfirst($action);
            if (
                \in_array($action, $this->availableActions) &&
                method_exists($this, $actionName)
            ) {
                $this->$actionName($actionParams);
            } else {
                echo 'Can`t find ' . $action . ' action in ' . $this->getName() . PHP_EOL;
            }
        }
    }

    /**
     * @param mixed|string $name
     * @return Vehicle
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isMusicOn(): bool
    {
        return $this->musicOn;
    }
}