<?php
include_once dirname(__DIR__, 4) . "/php/config/setup.php";

use controller\InfoController;
use controller\MethodNotAllowedController;

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

switch ($method) {
    case 'GET':
        $controller = new InfoController();
        echo $controller->getRequestInfo();
        break;

    default:
        $controller = new MethodNotAllowedController();
        echo $controller->work();
        break;
}
