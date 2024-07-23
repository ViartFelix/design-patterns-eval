<?php

ini_set('memory_limit', '64M');


require_once "vendor/autoload.php";

use App\Box\BoxManager;
use Spatie\Ignition\Ignition;
use App\Box\Box;
use App\Factories\EnginFactory;


Ignition::make()->register();

$box = new Box();
$manager = BoxManager::getInstance();

$instances = [
    EnginFactory::create("Bulldozer"),
    EnginFactory::create("Nacelle"),
    EnginFactory::create("Pelleteuse"),
    EnginFactory::create("RouleauCompresseur"),
    EnginFactory::create("Tractopelle"),
    EnginFactory::create("Bulldozer"),
    EnginFactory::create("Nacelle"),
    EnginFactory::create("Nacelle"),
];

foreach ($instances as $instance) {
    $box->addEngin($instance);
}

$a = EnginFactory::create("Pelleteuse");

dump(BoxManager::getInstance()->getBoxes());

BoxManager::getInstance()->addEnginEqually($a);

dump(BoxManager::getInstance()->getBoxes());