<?php

namespace view;

class AccentColor
{

    private string $accentColor;

    public function __construct(string $accentColor)
    {
        $this->accentColor = $accentColor;
    }

    public function render(): false|string
    {
        return ":root{--accent-color: " . $this->accentColor . ";}";
    }

}
