<?php

namespace controller;

use view\JsonView;

class InfoController
{

    public function getRequestInfo(): string
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
