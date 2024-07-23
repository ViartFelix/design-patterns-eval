<?php

namespace App\Engins;

use app\Box\Box;
use ReflectionClass;

/**
 * Classe parente des engins
 */
abstract class Engin implements EnginContract
{
    public function __construct()
    {

    }

    public function goToChantier(Box $box): void
    {
    }

    public function goToBox(Box $box): void
    {
        $box->addEngin($this);
    }

    /**
     * Retourne le nom de la classe de l'engin actuellement instancié
     * @return string
     */
    public function getEnginName(): string
    {
        $reflection = new ReflectionClass($this);
        return $reflection->getShortName();
    }
}