<?php

require_once "./controllerInterface.php";

/** Un autre type de mannette */
class PowerGlove implements ControllerInterface
{
    public function pressBtnUp()
    {
        echo "Stand up";
    }

    public function pressBtnDown()
    {
        echo "Stand down";
    }
}