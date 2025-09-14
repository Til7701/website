<?php

namespace dao;

use model\Post;
use model\PostEntry;
use model\PostGroup;

class HardcodedPostDAO implements PostDAO
{

    private array $posts;
    private array $navPosts;

    public function __construct()
    {
        $this->posts = $this->createPosts();
        $this->navPosts = $this->createNavPosts($this->posts);
    }

    private function createNavPosts(array $posts): array
    {
        $navPosts = [];
        foreach ($posts as $entry) {
            if ($entry->isShowInNav()) {
                if ($entry instanceof PostGroup) {
                    $navPosts[] = new PostGroup(
                        $entry->getPath(),
                        $entry->getTitle(),
                        $entry->getTemplate(),
                        $this->createNavPosts($entry->getPosts()),
                    );
                } elseif ($entry instanceof Post && $entry->isShowInNav()) {
                    $navPosts[] = $entry;
                }
            }
        }
        return $navPosts;
    }

    public function findAllInHierarchyForNav(): array
    {
        return $this->navPosts;
    }

    public function findAccessibleByPath(string $path): ?PostEntry
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
        if ($entry instanceof PostGroup) {
            if ($entry->getPath() === $path && $entry->isAllowAccess()) {
                return $entry;
            }
            foreach ($entry->getPosts() as $subEntry) {
                $result = $this->findByPathInEntry($subEntry, $path);
                if ($result !== null) {
                    return $result;
                }
            }
        } elseif ($entry instanceof Post) {
            if ($entry->getPath() === $path && $entry->isAllowAccess()) {
                return $entry;
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
            ),
            new PostGroup("/projects",
                "Projects",
                "from-markdown/projects.html",
                [
                    new Post("/projects/website",
                        "This Website",
                        "from-markdown/projects/website.html",
                    ),
                    new Post("/projects/request-sink",
                        "request-sink",
                        "from-markdown/projects/request-sink.html",
                    ),
                    new Post("/projects/battery-status",
                        "battery-status",
                        "from-markdown/projects/battery-status.html",
                    ),
                    new PostGroup("/projects/schlunzis",
                        "schlunzis",
                        "from-markdown/projects/schlunzis.html",
                        [
                            new Post("/projects/schlunzis/ppa",
                                "PPA",
                                "from-markdown/projects/schlunzis/ppa.html",
                            ),
                            new Post("/projects/schlunzis/vigilia",
                                "Vigilia",
                                "from-markdown/projects/schlunzis/vigilia.html",
                            ),
                            new Post("/projects/schlunzis/kurtama",
                                "Kurtama",
                                "from-markdown/projects/schlunzis/kurtama.html",
                            ),
                        ],
                    ),
                ],
            ),
            new PostGroup("/guides",
                "Guides",
                "from-markdown/guides.html",
                [
                    new Post("/guides/java-packaging",
                        "Java Packaging",
                        "from-markdown/guides/java-packaging.html",
                        showInNav: false
                    ),
                ],
                showInNav: false
            ),
            new Post("/long",
                "Long Post",
                "from-markdown/long.html",
            ),
            new Post("/imprint",
                "Imprint",
                "footer/imprint.php",
            ),
            new Post("/privacy-policy",
                "Privacy Policy",
                "footer/privacy.php",
            ),
            new Post("/terms-of-service",
                "Terms of Service",
                "footer/terms.php",
            ),
        ];
    }

}
