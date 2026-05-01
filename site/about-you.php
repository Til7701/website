<?php

use controller\AboutYouController;

include_once __DIR__ . "/php/config/setup.php";

$controller = new AboutYouController();
echo $controller->work();
