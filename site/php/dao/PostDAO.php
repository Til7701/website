<?php

namespace dao;

use model\PostEntry;

interface PostDAO
{

    function findAllInHierarchyForNav(): array;

    function findAccessibleByPath(string $path): ?PostEntry;

}
