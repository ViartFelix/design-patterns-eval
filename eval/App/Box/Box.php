<?php

namespace app\Box;

use App\Engins\Engin;
use App\Box\BoxManager;

/**
 * Classe Box.
 * Vas limiter le nombre maximum d'instances des engins.
 * Patterns utilisés: Multiton, encapsulation, FluentInterface,
 */
class Box
{
    /** @var int Nombre maximum d'instances d'engins */
    private int $maxInstances = 8;

    /** @var array|Engin[] Tableau d'instances des engins */
    private array $engins;



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
        if(empty($this->engins)) {
            //alors instancier le tableau avec l'engin dedans
            $this->engins = [$engin];
            //ajouter la boîte
            BoxManager::getInstance()->addBox($this);
        }
        //si on peut ajouter encore un engin
        else if($this->canInsertEngin()) {
            $this->engins[] = $engin;
        }
        //sinon, alors on demande au BoxManager d'ajouter une nouvelle boîte contenant l'engin
        else {
            BoxManager::getInstance()->createBox($this);
            //ajout d'une nouvelle boîte avec son engin
            $newBox = new Box();
            $newBox->addEngin($engin);
            //pas besoin de l'ajouter explicitement au box manager
        }

        return $this;
    }

    /**
     * Supprime un engin de la boîte grâce à son index
     * @param int $index
     * @return $this
     */
    public function removeEngin(int $index): Box
    {
        if(isset($this->engins[$index])) {
            unset($this->engins[$index]);
        }

        //reinitialisation des clefs du tableau
        $this->setEngins(array_values($this->engins));

        return $this;
    }

    /**
     * Regarde si on peut insérer un engin dans la boîte
     * @return bool
     */
    public function canInsertEngin(): bool
    {
        return sizeof($this->engins) < $this->maxInstances;
    }

    // --------------------------------------------------------------------------------------------

    /**
     * Retourne une ou les instances d'engins
     * @param int|null $index
     * @return Engin|Engin[]|array|mixed
     */
    public function getInstance(int|null $index = null): mixed
    {
        if(isset($index)) {
            return $this->engins[$index];
        }

        return $this->engins;
    }

    public function setEngins(array $engins): void
    {
        $this->engins = $engins;
    }
}
