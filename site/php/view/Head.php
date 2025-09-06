<?php

namespace view;

class Head
{

    public static function create($title, $cssFiles = array(), $jsFiles = array()): false|string
    {
        ob_start();
        include "../php/templates/head.php";
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}
