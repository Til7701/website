<?php

use model\ExternalLink;
use model\NavEntry;
use model\Post;
use model\PostGroup;
use model\Separator;

function renderNavItem(NavEntry $item, Post|null $current_post): void
{
    if ($item instanceof Separator) {
        echo '<li class="separator"></li>';
    } elseif ($item instanceof ExternalLink) {
        echo '<li>';
        echo '<a href="' . htmlspecialchars($item->getUrl()) . '" target="_blank" rel="noopener noreferrer">';
        echo htmlspecialchars($item->getTitle());
        echo '</a>';
        echo '</li>';
    } elseif ($item instanceof PostGroup) {
        echo '<li>';
        echo '<a href="' . htmlspecialchars($item->getPath()) . '"'
            . ($current_post && $item->getPath() === $current_post->getPath() ? ' class="current"' : '') . '>';
        echo htmlspecialchars($item->getTitle());
        echo '</a>';
        echo '<ul>';
        foreach ($item->getPosts() as $child) {
            renderNavItem($child, $current_post);
        }
        echo '</ul>';
        echo '</li>';
    } elseif ($item instanceof Post) {
        echo '<li>';
        echo '<a href="' . htmlspecialchars($item->getPath()) . '"'
            . ($current_post && $item->getPath() === $current_post->getPath() ? ' class="current"' : '') . '>';
        echo htmlspecialchars($item->getTitle());
        echo '</a>';
        echo '</li>';
    }
}

function renderNavigation(array $post_hierarchy, Post|null $current_post): void
{
    echo '<nav><ul>';
    foreach ($post_hierarchy as $item) {
        renderNavItem($item, $current_post);
    }
    echo '</ul></nav>';
}

if (isset($post_hierarchy) && (isset($current_post) || $current_post === null)) {
    renderNavigation($post_hierarchy, $current_post);
} else {
    echo '<!-- Navigation data not available -->';
}
