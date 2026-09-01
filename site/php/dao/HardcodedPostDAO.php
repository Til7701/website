<?php

namespace dao;

use model\ExternalLink;
use model\NavEntry;
use model\Post;
use model\PostGroup;
use model\Separator;

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
            if ($entry instanceof Separator) {
                $navPosts[] = $entry;
            } elseif ($entry instanceof ExternalLink) {
                $navPosts[] = $entry;
            } elseif ($entry instanceof PostGroup && $entry->isShowInNav()) {
                $navPosts[] = new PostGroup(
                    $entry->getPath(),
                    $entry->getTitle(),
                    $entry->getTocTemplate(),
                    $entry->getTemplates(),
                    $this->createNavPosts($entry->getPosts()),
                );
            } elseif ($entry instanceof Post && $entry->isShowInNav()) {
                $navPosts[] = $entry;
            }
        }
        return $navPosts;
    }

    public function findAllInHierarchyForNav(): array
    {
        return $this->navPosts;
    }

    public function findAccessibleByPath(string $path): ?NavEntry
    {
        foreach ($this->posts as $entry) {
            $result = $this->findByPathInEntry($entry, $path);
            if ($result !== null) {
                return $result;
            }
        }
        return null;
    }

    private function findByPathInEntry(NavEntry $entry, string $path): ?NavEntry
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
                null,
                ["from-markdown/home_content.html"],
            ),
            new PostGroup("/projects",
                "Projects",
                "from-markdown/projects_toc.html",
                ["from-markdown/projects_content.html"],
                [
                    new Post("/projects/website",
                        "This Website",
                        "from-markdown/projects/website_toc.html",
                        ["from-markdown/projects/website_content.html"],
                        css: ["code-blocks"],
                        showInNav: true,
                    ),
                    new PostGroup("/projects/puzzled",
                        "Puzzled",
                        "from-markdown/projects/puzzled_toc.html",
                        [
                            "special/puzzled_header.html",
                            "from-markdown/projects/puzzled_content.html",
                        ],
                        [
                            new Post("/projects/puzzled/collection-spec",
                                "Collection Spec",
                                "from-markdown/projects/puzzled/collection-spec_toc.html",
                                ["from-markdown/projects/puzzled/collection-spec_content.html"],
                                css: ["polyomino", "tables", "code-blocks", "code-blocks-json"],
                                js: ["code-block-copy"],
                                showInNav: false
                            )],
                        css: ["code-blocks", "code-blocks-bash", "puzzled"],
                        js: ["code-block-copy"],
                    ),
                ],
            ),
            new Separator(),
            new Post("/api-docs",
                "API Docs",
                null,
                ["api/swagger-ui.php"],
                css: ["/api/v1/swagger-ui/swagger-ui.css", "fill-article"],
                showInNav: true,
            ),
            new Separator(),
            new ExternalLink(
                "https://mastodon.social/@til7701",
                "Mastodon"
            ),
            new ExternalLink(
                "https://github.com/Til7701",
                "GitHub"
            ),
            new ExternalLink(
                "https://codeberg.org/Til7701",
                "Codeberg"
            ),
            new Separator(),
            new Post("/impressum",
                "Impressum",
                null,
                ["footer/impressum.php"],
                showInNav: false,
                allowAccess: false
            ),
            new Post("/privacy-policy",
                "Privacy Policy",
                "from-markdown/privacy-policy_toc.html",
                ["from-markdown/privacy-policy_content.html"],
            ),
        ];
    }

}
