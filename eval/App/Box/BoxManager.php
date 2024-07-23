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
     * @return array|Box
     */
    public function getBoxes(int|null $index = null): array|Box
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

        //tableau contenant le nombre d'instances des boîtes
        $allBoxesEngins = array();

        foreach ($this->getBoxes() as $index => $box)
        {
            //comptage du nombre d'instances des classes ci-dessus
            $resultArray = array_fill_keys($uniqueInstances, 0);

            foreach ($box->getInstance() as $engin) {
                //nom de l'engin instancié
                $enginClass = $engin->getEnginName();
                //incrémentation du nombre d'instances de cette classe
                $resultArray[$enginClass]++;
            }

            $allBoxesEngins[] = $resultArray;

        }
        $this->insertEqually($allBoxesEngins, $toInsert);
    }

    /**
     * Vas insérer, selon plusieurs conditions, l'engin dans les boîtes
     * @param array $allBoxEngins
     * @param $toInsert
     * @return void
     */
    private function insertEqually(array $allBoxEngins, $toInsert): void
    {
        //si l'engin a été inséré ou non
        $hasInserted = false;

        $classNameEngin = $toInsert->getEnginName();

        foreach ($allBoxEngins as $index => $box) {
            //boîte actuelle
            $currentBox = $this->getBoxes($index);

            //si une place est disponible et que l'engin inséré est le seul de son type
            if(
                $box[$classNameEngin] < 1 &&
                $currentBox->canInsertEngin() &&
                !$hasInserted
            ) {
                //alors on l'insère directement dans la boîte
                $hasInserted = true;
                $currentBox->addEngin($toInsert);
            }
        }

        //si l'engin n'a pas encore été inséré, alors on vas l'insérer dans la première boîte disponible
        if(!$hasInserted) {
            foreach ($allBoxEngins as $index => $box) {
                if($box->canInsertEngin() && !$hasInserted) {
                    $hasInserted = true;
                    $box->addEngin($toInsert);
                }
            }
        }

        //et si aucune boîte n'est disponible
        if(!$hasInserted) {
            //alors créer une nouvelle boîte
            $newBox = new Box();
            $newBox->addEngin($toInsert);
        }
    }
}