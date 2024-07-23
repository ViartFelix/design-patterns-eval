<?php

require_once "./controller.php";
require_once "./PowerGlove.php";

class MegaDrive
{
    private Controller $controllerOne;
    private PowerGlove $controllerTwo;

    function __construct()
    {
        $this->controllerOne = new Controller();
        $this->controllerTwo = new PowerGlove();
    }
}