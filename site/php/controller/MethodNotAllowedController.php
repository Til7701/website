<?php

namespace controller;

class MethodNotAllowedController
{

    private array $allowedMethods;

    public function work(): string
    {
        header('Allow: ' . implode(', ', $this->allowedMethods));
        http_response_code(405);
        return "";
    }

    public function setAllowedMethods(array $array)
    {
        $this->allowedMethods = $array;
    }

}
