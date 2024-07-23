<?php

namespace Factories;

use Engins\Bulldozer;
use Engins\Engin;
use Engins\Nacelle;
use Engins\Pelleteuse;
use Engins\RouleauCompresseur;
use Engins\Tractopelle;

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