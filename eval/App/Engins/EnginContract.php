<?php

namespace App\Engins;

use app\Box\Box;

interface EnginContract
{
    /** Fais partir au chantier l'engin */
    public function goToChantier(
        Box $box
    ): void;

    /** Fais revenir (ou insère) l'engin dans la boîte */
    public function goToBox(
        Box $box
    ): void;
}