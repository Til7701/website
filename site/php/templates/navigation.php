<nav>
    <ul>
        <?php use model\Post;
        use model\PostGroup;

        foreach ($post_hierarchy as $post): ?>
            <?php if ($post instanceof Post): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($post->getPath()); ?>">
                        <?php echo htmlspecialchars($post->getTitle()); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($post instanceof PostGroup): ?>
                <li>
                    <?php echo htmlspecialchars($post->getTitle()); ?>
                    <ul>
                        <?php foreach ($post->getPosts() as $subPost): ?>
                            <?php if ($subPost instanceof Post) { ?>
                                <li>
                                    <a href="<?php echo htmlspecialchars($subPost->getPath()); ?>">
                                        <?php echo htmlspecialchars($subPost->getTitle()); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>
