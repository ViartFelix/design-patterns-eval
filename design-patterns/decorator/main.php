<?php

require "./Hello.php";
require "./BirthdayDecorator.php";

$hello = new Hello();
$hello = new BirthdayDecorator($hello);
echo $hello->sayHello("Jean");