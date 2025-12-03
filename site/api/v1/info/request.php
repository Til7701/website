<?php
include_once dirname(__DIR__, 3) . "/php/config/setup.php";

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
        $controller->setAllowedMethods(['GET']);
        echo $controller->work();
        break;
}
