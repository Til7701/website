<?php

namespace view;

class JsonView
{

    private array $data = array();

    public function setData(array $data): JsonView
    {
        $this->data = $data;
        return $this;
    }

    public function render(): string
    {
        header('Content-Type: application/json; charset=utf-8');

        return json_encode($this->data, JSON_UNESCAPED_UNICODE);
    }
}
