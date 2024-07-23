<?php

namespace Box;

use Engins\Engin;

/**
 * Classe Box.
 *
 */
class Box
{
    /** @var int Nombre maximum d'instances d'engins */
    private int $maxInstances = 8;

    /** @var array|Engin[] Tableau d'instances des engins */
    private static array $engins;

    public function __construct()
    {
        return $this;
    }

    /**
     * Vas ajouter un engin si on peut en rajouter
     * @param $engin
     * @return $this
     */
    public function addEngin($engin): Box
    {
        //si aucun engin dans la box
        if(empty(self::$engins)) {
            //alors instancier le tableau avec l'engin dedans
            self::$engins = [$engin];
        }
        //si on peut ajouter encore un engin
        else if($this->canInsert($engin)) {
            self::$engins[] = $this;
        }
        //sinon, alors on demande au BoxManager d'ajouter une boîte
        else {
            BoxManager::getInstance()->addBox($this);
        }

        return $this;
    }

    public function getInstance(int|null $index = null)
    {
        if(isset($index)) {
            return self::$engins[$index];
        }

        return self::$engins;
    }

    /**
     * Vas checker si on peut ajouter un engin à la boîte
     * et si au moins un engin est présent dans chaque boîte
     * @param $toInsert
     * @return bool
     */
    public function canInsert($toInsert): bool
    {
        /** @var array $conditions Tableau des résultats des conditions */
        $conditions = array();
        //si le nombre d'instances est inférieur à la limite
        $conditions[] = sizeof(self::$engins) < $this->maxInstances;

        $engins = self::getInstance();

        /*
        foreach($engins as $engin) {
            $instance = get_class($engin);

            if(in_array($instance, BoxManager::getToBeUnique())) {

            }
        }
        */

        return !in_array(false, $conditions);
    }
}