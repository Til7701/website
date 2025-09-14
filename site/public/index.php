<?php
include_once __DIR__ . "/../php/config/setup.php";

use controller\IndexController;

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

$controller = new IndexController($path);
echo $controller->work();
