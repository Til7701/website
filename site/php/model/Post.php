<?php

namespace model;

class Post implements NavEntry
{

    private string $path;
    private string $title;
    private ?string $toc_template;
    private array $templates;
    private array $css;
    private array $js;
    private bool $showInNav;
    private bool $allowAccess;

    public function __construct(
        string  $path,
        string  $title,
        ?string $toc_template,
        array   $templates,
        array   $css = [],
        array   $js = [],
        bool    $showInNav = true,
        bool    $allowAccess = true,
    )
    {
        $this->path = $path;
        $this->title = $title;
        $this->toc_template = $toc_template;
        $this->templates = $templates;
        $this->css = $css;
        $this->js = $js;
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

    public function getTocTemplate(): ?string
    {
        return $this->toc_template;
    }

    public function getTemplates(): array
    {
        return $this->templates;
    }

    public function getCss(): array
    {
        return $this->css;
    }

    public function getJs(): array
    {
        return $this->js;
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
