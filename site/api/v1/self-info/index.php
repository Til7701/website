<?php
include_once dirname(__DIR__, 3) . "/php/config/setup.php";

use controller\MethodNotAllowedController;
use controller\SelfInfoController;

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

switch ($method) {
    case 'GET':
        $controller = new SelfInfoController();
        echo $controller->workGET();
        break;

    default:
        $controller = new MethodNotAllowedController();
        echo $controller->work();
        break;
}
