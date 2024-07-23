<?php

namespace App\Box;

/**
 * Classe qui va gérer les box.
 * Paternes utilisés: Singleton, encapsulation
 */
class BoxManager
{
    /** @var BoxManager Instance de boxManager */
    private static BoxManager $instance;

    /** @var array Tableau contenant les instances de boîtes */
    private array $boxes = array();

    public function __construct()
    {}

    /**
     * Retourne l'instance du singleton manager
     * @return BoxManager
     */
    public static function getInstance(): BoxManager
    {
        if(!isset(self::$instance)) {
            self::$instance = new BoxManager();
        }

        return self::$instance;
    }

    /**
     * Ajoute une boîte au manager des boîtes.
     * @param Box $box
     * @return $this
     */
    public function addBox(Box $box): BoxManager
    {
        $this->boxes[] = $box;
        return $this;
    }

    /**
     * Supprime une boîte du manager.
     * @param int $index
     * @return $this
     */
    public function removeBox(int $index): BoxManager
    {
        if(isset($this->boxes[$index])) {
            unset($this->boxes[$index]);
        }
        //reinitialisation des clefs du tableau
        $this->boxes = array_values($this->boxes);

        return $this;
    }

    /**
     * Retourne toutes les boîtes ou une seule boîte
     * @param int|null $index
     * @return array
     */
    public function getBoxes(int|null $index = null): array
    {
        if(isset($index)) {
            return $this->boxes[$index];
        }

        return $this->boxes;
    }

    /**
     * Créée une nouvelle boîte vide et la retourne
     * @return Box
     */
    public function createBox(): Box
    {
        return new Box();
    }

    /**
     * Vas ajouter un engin la boîte.
     * Si une boîte précédente ne possède pas cet engin et qu'il contient de la place,
     * alors le manager va l'insérer dans la boîte.
     * <hr/>
     * Si aucune boîte ne contient de place, alors le manager va insérer ce véhicule dans une nouvelle boîte.
     * @param $toInsert
     * @return void
     */
    public function addEnginEqually($toInsert): void
    {
        //instances pour lesquelles il faut checker la présence dans les boîtes
        $uniqueInstances = [
            "Bulldozer", "Nacelle", "Pelleteuse", "RouleauCompresseur", "Tractopelle"
        ];

        //si l'engin n'a pas encore été inséré
        $hasBeenInserted = false;
        foreach ($this->getBoxes() as $index => $box)
        {
            if(!$hasBeenInserted) {
                //comptage du nombre d'instances des classes ci-dessus
                $resultArray = array_fill_keys($uniqueInstances, 0);

                foreach ($box->getInstance() as $engin) {
                    //nom de l'engin instancié
                    $enginClass = $engin->getEnginName();
                    //incrémentation du nombre d'instances de cette classe
                    $resultArray[$enginClass]++;
                }

                //si aucune instance de l'engin n'est présent et qu'on peut l'insérer dans la boîte
                if($box->canInsertEngin()) {
                    $box->addEngin($toInsert);
                    $hasBeenInserted = true;
                    return;
                }
            }
        }

        //si aucune boîte ne peut insérer l'engin, alors créer une nouvelle boîte avec cet engin
        if(!$hasBeenInserted) {
            $newBox = new Box();
            $newBox->addEngin($toInsert);
        }
    }
}