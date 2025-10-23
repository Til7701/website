<?php

namespace controller;

use view\AccentColor;

class AccentColorController
{

    private array $colors;

    public function __construct()
    {
        $this->colors = [
            "#03a8f9",
            "#2BC17B",
            "#E2A000",
            "#E56210",
            "#A05EBB",
        ];
    }

    public function work(): string
    {
        $accentColor = $this->getFromArray();

        $view = new AccentColor($accentColor);
        return $view->render();
    }

    private function getFromArray(): string
    {
        return $this->colors[array_rand($this->colors)];
    }

}
