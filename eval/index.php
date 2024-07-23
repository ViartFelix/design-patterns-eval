<?php

require_once "vendor/autoload.php";

use App\Box\BoxManager;
use Spatie\Ignition\Ignition;
use App\Box\Box;
use App\Factories\EnginFactory;


Ignition::make()->register();

$box = new Box();
$manager = BoxManager::getInstance();

$instances = [
    new EnginFactory("Bulldozer"),
    new EnginFactory("Nacelle"),
    new EnginFactory("Pelleteuse"),
    new EnginFactory("RouleauCompresseur"),
    new EnginFactory("Tractopelle"),
    new EnginFactory("Bulldozer"),
    new EnginFactory("Nacelle"),
    new EnginFactory("Pelleteuse"),
    new EnginFactory("RouleauCompresseur"),
];

foreach ($instances as $instance) {
    $box->addEngin($instance);
}

dump($box->getInstance(), $manager);
