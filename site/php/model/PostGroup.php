<?php

namespace model;

class PostGroup extends Post implements NavEntry
{

    private array $posts;

    public function __construct(
        string $path,
        string $title,
        string $toc_template,
        array  $templates,
        array  $posts,
        array  $css = [],
        array  $js = [],
        bool   $showInNav = true,
        bool   $allowAccess = true,
    )
    {
        parent::__construct(
            $path,
            $title,
            $toc_template,
            $templates,
            $css,
            $js,
            $showInNav,
            $allowAccess,
        );
        $this->posts = $posts;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

}
