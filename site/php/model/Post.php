<?php

namespace model;

class Post implements PostEntry
{

    private string $path;
    private string $title;
    private string $template;
    private array $css;

    public function __construct(string $path, string $title, string $template, array $css)
    {
        $this->path = $path;
        $this->title = $title;
        $this->template = $template;
        $this->css = $css;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function getCss(): array
    {
        return $this->css;
    }

}
