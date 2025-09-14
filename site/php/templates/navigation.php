<?php

use model\Post;
use model\PostEntry;
use model\PostGroup;

function renderNavItem(PostEntry $item, Post|null $current_post): void
{
    if ($item instanceof PostGroup) {
        echo '<li>';
        echo '<a href="' . htmlspecialchars($item->getPath()) . '"'
            . ($item === $current_post ? ' class="current"' : '') . '>';
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
            . ($item === $current_post ? ' class="current"' : '') . '>';
        echo htmlspecialchars($item->getTitle());
        echo '</a>';
        echo '</li>';
    }
}

function renderNavigation(array $post_hierarchy, PostEntry|null $current_post): void
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
