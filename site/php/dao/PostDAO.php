<?php

namespace dao;

use model\PostEntry;

interface PostDAO
{

    function findAllInHierarchy(): array;

    function findByPath(string $path): ?PostEntry;

}
