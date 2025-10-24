#!/bin/sh

set -e

echo "Building SCSS Docker image..."
docker build -t scss:local ./docker/scss

echo "Building CSS from SCSS..."
docker run --rm -it --name scss \
  -w /app \
  -v "$(pwd)":/app \
  scss:local sh -c "sass src/scss:site/css --style compressed"

echo "CSS build complete."
