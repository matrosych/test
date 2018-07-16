<?php

require_once __DIR__ . '/../vendor/autoload.php';


$factoryJson = @file_get_contents(__DIR__ . '/factory.json');
if ($factoryJson === false) {
    throw new \Exception('Can`t find factory file');
}
$vehiclesToCreate = (array)json_decode($factoryJson, true);
foreach ($vehiclesToCreate as $vehicleScheme) {
    if (isset($vehicleScheme['type'])) {
        try {
            $parameters = isset($vehicleScheme['parameters']) ? $vehicleScheme['parameters'] : [];
            $vehicleObject = \App\Vehicle::create($vehicleScheme['type'], (array)$parameters);
            $vehicleObject->actionsRun();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

