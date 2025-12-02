<?php

namespace controller;

use view\JsonView;

class SelfInfoController
{

    public function workGET(): string
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $port = $_SERVER['REMOTE_PORT'] ?? -1;


        $data = [
            'address' => $ipAddress,
            'port' => $port
        ];

        $view = (new JsonView())
            ->setData($data);
        return $view->render();
    }

}
