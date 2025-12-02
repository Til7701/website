<?php

namespace controller;

class MethodNotAllowedController
{

    public function work(): string
    {
        header('Allow: GET');
        http_response_code(405);
        return "";
    }

}
