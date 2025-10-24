<?php

namespace controller;

use Random\RandomException;
use view\AccentColor;

class AccentColorController
{

    public function work(): string
    {
        $hue = $this->getRandomHue();

        $view = new AccentColor($hue);
        return $view->render();
    }

    private function getRandomHue(): string
    {
        try {
            return random_int(0, 180);
        } catch (RandomException) {
            return rand(0, 180);
        }
    }

}
