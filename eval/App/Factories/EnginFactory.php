<?php

namespace App\Factories;

use App\Engins\Bulldozer;
use App\Engins\Engin;
use App\Engins\Nacelle;
use App\Engins\Pelleteuse;
use App\Engins\RouleauCompresseur;
use App\Engins\Tractopelle;
use Exception;

class EnginFactory
{
    /**
     * @throws Exception
     */
    public static function create(string $class)
    {
        //équivalent switch
        return match ($class) {
            "Bulldozer" => new Bulldozer(),
            "Nacelle" => new Nacelle(),
            "Pelleteuse" => new Pelleteuse(),
            "RouleauCompresseur" => new RouleauCompresseur(),
            "Tractopelle" => new Tractopelle(),
            default => throw new Exception("L'engin $class n'existe pas."),
        };
    }


}