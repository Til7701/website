<?php

namespace dao;

use model\Post;
use model\PostEntry;
use model\PostGroup;

class HardcodedPostDAO implements PostDAO
{

    private array $posts;

    public function __construct()
    {
        $this->posts = $this->createPosts();
    }

    public function findAllInHierarchy(): array
    {
        return $this->posts;
    }

    public function findByPath(string $path): ?Post
    {
        foreach ($this->posts as $entry) {
            $result = $this->findByPathInEntry($entry, $path);
            if ($result !== null) {
                return $result;
            }
        }
        return null;
    }

    private function findByPathInEntry(PostEntry $entry, string $path): ?Post
    {
        if ($entry instanceof Post) {
            if ($entry->getPath() === $path) {
                return $entry;
            }
        } elseif ($entry instanceof PostGroup) {
            foreach ($entry->getPosts() as $subEntry) {
                $result = $this->findByPathInEntry($subEntry, $path);
                if ($result !== null) {
                    return $result;
                }
            }
        }
        return null;
    }

    private function createPosts(): array
    {
        return [
            new Post("/",
                "Home",
                "from-markdown/home.html",
                []
            ),
            new PostGroup("Guides", [
                new Post("/guides/java-packaging",
                    "Java Packaging",
                    "from-markdown/guides/java-packaging.html",
                    []
                ),
                new Post("/guides/product2",
                    "Product 2",
                    "product2.php",
                    []
                ),
            ]),
            new Post("/about",
                "About",
                "about.php",
                []
            ),
            new Post("/contact",
                "Contact",
                "contact.php",
                []
            ),
            new Post("/blog",
                "Blog",
                "blog.php",
                []
            ),
        ];
    }

}
