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

    public function findByPath(string $path): ?PostEntry
    {
        foreach ($this->posts as $entry) {
            $result = $this->findByPathInEntry($entry, $path);
            if ($result !== null) {
                return $result;
            }
        }
        return null;
    }

    private function findByPathInEntry(PostEntry $entry, string $path): ?PostEntry
    {
        if ($entry instanceof Post) {
            if ($entry->getPath() === $path) {
                return $entry;
            }
        } elseif ($entry instanceof PostGroup) {
            if ($entry->getPath() === $path) {
                return $entry;
            }
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
            new PostGroup("/guides",
                "Guides",
                "guides.php",
                [],
                [
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
            new Post("/long",
                "Long Post",
                "from-markdown/long.html",
                []
            ),
            new Post("/imprint",
                "Imprint",
                "footer/imprint.php",
                []
            ),
            new Post("/privacy-policy",
                "Privacy Policy",
                "footer/privacy.php",
                []
            ),
            new Post("/terms-of-service",
                "Terms of Service",
                "footer/terms.php",
                []
            ),
        ];
    }

}
