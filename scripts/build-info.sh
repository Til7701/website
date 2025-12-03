#!/bin/bash

set -e

COMMIT_HASH=$(git rev-parse --short HEAD)
GIT_TREE_STATE=$(git rev-parse --is-tree-clean)
if [ "${GIT_TREE_STATE}" != "true" ]; then
  GIT_TREE_STATE="dirty"
fi
BUILD_DATE=$(date -u +"%Y-%m-%dT%H:%M:%SZ")

mkdir -p site/php/build-info

touch site/php/build-info/commit_hash.txt
touch site/php/build-info/build_date.txt
touch site/php/build-info/git_tree_state.txt

echo "${COMMIT_HASH}" > site/php/build-info/commit_hash.txt
echo "${BUILD_DATE}" > site/php/build-info/build_date.txt
echo "${GIT_TREE_STATE}" > site/php/build-info/git_tree_state.txt
