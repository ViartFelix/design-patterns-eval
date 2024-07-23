<?php

namespace Box;

/**
 * Classe qui va gérer les box.
 * Singleton
 */
class BoxManager
{
    /** @var BoxManager Instance de boxManager */
    private static BoxManager $instance;

    private array $boxes = array();

    private static array $toBeUnique = array(
        "Bulldozer", "Nacelle", "Pelleteuse", "RouleauCompresseur", "Tractopelle"
    );

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

    public function addBox(Box $box): BoxManager
    {
        $this->boxes[] = $box;
        return $this;
    }

    public function removeBox(Box $box): BoxManager
    {
        //array diff pour retourner ce qui est différent entre les deux arrays de Box
        $this->boxes = array_diff($this->boxes, [$box]);
        return $this;
    }

    public function getBoxes(): array
    {
        return $this->boxes;
    }

    public static function getToBeUnique(): array
    {
        return self::$toBeUnique;
    }
}