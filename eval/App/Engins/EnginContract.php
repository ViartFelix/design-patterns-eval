<?php

namespace App\Engins;

use app\Box\Box;

interface EnginContract
{
    public function goToChantier(
        Box $box
    ): void;

    public function goToBox(
        Box $box
    ): void;
}