<?php

namespace App\Factories;

use App\Engins\Bulldozer;
use App\Engins\Engin;
use App\Engins\Nacelle;
use App\Engins\Pelleteuse;
use App\Engins\RouleauCompresseur;
use App\Engins\Tractopelle;

class EnginFactory
{
    /** @var Engin Instance demandée */
    private Engin $instance;

    public function __construct(string $class)
    {
        switch($class) {
            case "Bulldozer":
                $this->instance = new Bulldozer();
                break;
            case "Nacelle":
                $this->instance = new Nacelle();
                break;
            case "Pelleteuse":
                $this->instance = new Pelleteuse();
                break;
            case "RouleauCompresseur":
                $this->instance = new RouleauCompresseur();
                break;
            case "Tractopelle":
                $this->instance = new Tractopelle();
                break;
        }

        return $this->instance;
    }

    /**
     * Retourne l'instance de l'engin
     * @return Engin
     */
    public function getInstance(): Engin
    {
        return $this->instance;
    }
}