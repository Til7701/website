<?php
include_once __DIR__ . "/../php/config/setup.php";

use controller\IndexController;

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);


if (str_starts_with($path, '/api')) {
    // Not implemented yet
    http_response_code(501);
    exit;
}

$controller = new IndexController($path);
echo $controller->work();
