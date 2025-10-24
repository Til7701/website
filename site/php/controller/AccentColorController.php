<?php

namespace controller;

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
        return rand(0, 180);
    }

}
