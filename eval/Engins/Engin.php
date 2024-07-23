<?php

namespace Engins;

/**
 * Multiton qui vas retenir les engins (max: 8).
 */
abstract class Engin
{


    public function __construct()
    {

    }

    public function getInstance(int|null $index)
    {
        if(isset($index))
        {
            return self::$instances[$index];
        }

        return self::$instances;
    }

    public function getMaxInstances(): int
    {
        return $this->maxInstances;
    }
}