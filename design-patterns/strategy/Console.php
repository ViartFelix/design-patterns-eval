<?php

require_once "./controllerInterface.php";

abstract class Console {
    private $controllerOne;
    private $controllerTwo;

    public function __construct(ControllerInterface $controllerOne, ControllerInterface $controllerTwo) {
        $this->controllerOne = $controllerOne;
        $this->controllerTwo = $controllerTwo;
    }

    function pressBtnDownPOne() {
        $this->controllerOne->pressBtnDown();
    }
}