<?php

require_once "./controller.php";

class ps2 extends Console
{
    private Controller $controllerOne;
    private Controller $controllerTwo;

    function __construct()
    {
        $this->controllerOne = new Controller();
        $this->controllerTwo = new Controller();
    }
}