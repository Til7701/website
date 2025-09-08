<nav>
    <ul>
        <?php

        use model\Post;
        use model\PostGroup;

        foreach ($post_hierarchy as $post): ?>
            <?php if ($post instanceof Post): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($post->getPath()); ?>"
                       class="<?php echo $post === $current_post ? 'current' : ''; ?>">
                        <?php echo htmlspecialchars($post->getTitle()); ?>
                    </a>
                </li>
            <?php elseif ($post instanceof PostGroup): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($post->getPath()); ?>"
                       class="<?php echo $post === $current_post ? 'current' : ''; ?>">
                        <?php echo htmlspecialchars($post->getTitle()); ?>
                    </a>
                    <ul>
                        <?php foreach ($post->getPosts() as $subPost): ?>
                            <?php if ($subPost instanceof Post): ?>
                                <li>
                                    <a href="<?php echo htmlspecialchars($subPost->getPath()); ?>"
                                       class="<?php echo $subPost === $current_post ? 'current' : ''; ?>">
                                        <?php echo htmlspecialchars($subPost->getTitle()); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>
