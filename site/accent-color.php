<?php
include_once __DIR__ . "/php/config/setup.php";

use controller\AccentColorController;

$controller = new AccentColorController();
header('Content-Type: text/css');
echo $controller->work();
