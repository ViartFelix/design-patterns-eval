<?php

class BirthdayDecorator {
    private Hello $hello;

    public function __construct(Hello $hello) {
        $this->hello = $hello;
    }

    public function sayHello(string $name): string
    {
        return $this->hello->sayHello($name) . ", joyeux anniversaire !";
    }
}