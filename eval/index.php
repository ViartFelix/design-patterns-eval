<?php

ini_set('memory_limit', '64M');
//autoload pour Ignition & le var-dumper de symfony
require_once "vendor/autoload.php";

use App\Box\BoxManager;
use Spatie\Ignition\Ignition;
use App\Box\Box;
use App\Factories\EnginFactory;

Ignition::make()->register();

$box = new Box();
$manager = BoxManager::getInstance();
//instances de test
$instances = [
    EnginFactory::create("Bulldozer"),
    EnginFactory::create("Nacelle"),
    EnginFactory::create("Pelleteuse"),
    EnginFactory::create("RouleauCompresseur"),
    EnginFactory::create("Bulldozer"),
    EnginFactory::create("Tractopelle")
];

foreach ($instances as $instance) {
    //ajout des engins dans une/des boîte(s)
    //méthode 1 pour les ajouter de façon harmonieuse (répartition des engins)
    //BoxManager::getInstance()->addEnginEqually($instance);
    //méthode 2: plus bourrine
    $box->addEngin($instance);
}

$box2 = new Box();


$box2->addEngin(EnginFactory::create("RouleauCompresseur"));
BoxManager::getInstance()->addEnginEqually(EnginFactory::create("Tractopelle"));

$pel = EnginFactory::create("Pelleteuse");
//avant l'ajout de la pelleteuse
dump(BoxManager::getInstance()->getBoxes());
//ajout de la pelleteuse
BoxManager::getInstance()->addEnginEqually($pel);
//après l'ajout de la pelleteuse: nouvelle boîte avec cet engin dedans
dump(BoxManager::getInstance()->getBoxes());
