<?php

namespace model;

class PostGroup implements PostEntry
{

    private string $path;
    private string $title;
    private string $template;
    private array $css;
    private array $posts;

    public function __construct(string $path, string $title, string $template, array $css, array $posts)
    {
        $this->path = $path;
        $this->title = $title;
        $this->template = $template;
        $this->css = $css;
        $this->posts = $posts;
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

    public function getPosts(): array
    {
        return $this->posts;
    }

}
