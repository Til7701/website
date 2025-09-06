<?php

namespace dao;

use model\Post;

interface PostDAO
{

    function findAllInHierarchy(): array;

    function findByPath(string $path): ?Post;

}
