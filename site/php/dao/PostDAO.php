<?php

namespace dao;

use model\NavEntry;

interface PostDAO
{

    function findAllInHierarchyForNav(): array;

    function findAccessibleByPath(string $path): ?NavEntry;

}
