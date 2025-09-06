<?php

namespace model;

class PostGroup implements PostEntry
{

    private string $title;
    private array $posts;

    public function __construct(string $name, array $posts)
    {
        $this->title = $name;
        $this->posts = $posts;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

}
