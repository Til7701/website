<?php

namespace model;

class Post implements PostEntry
{

    private string $path;
    private string $title;
    private string $template;
    private array $css;
    private bool $showInNav;
    private bool $allowAccess;

    public function __construct(
        string $path,
        string $title,
        string $template,
        array  $css = [],
        bool   $showInNav = true,
        bool   $allowAccess = true
    )
    {
        $this->path = $path;
        $this->title = $title;
        $this->template = $template;
        $this->css = $css;
        $this->showInNav = $showInNav;
        $this->allowAccess = $allowAccess;
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

    public function isShowInNav(): bool
    {
        return $this->showInNav;
    }

    public function isAllowAccess(): bool
    {
        return $this->allowAccess;
    }

}
