<?php

namespace view;

class AccentColor
{

    private string $hue;

    public function __construct(string $hue)
    {
        $this->hue = $hue;
    }

    public function render(): false|string
    {
        return ":root{--accent-color: " . "hsl(" . $this->hue . ", 75%, 50%);}";
    }

}
