#!/bin/sh

set -e

UID=$(id -u)
GID=$(id -g)

docker run --rm \
  -u "${UID}":"${GID}" \
  -v "${PWD}":/local \
   openapitools/openapi-generator-cli:v7.17.0 validate \
  -i /local/src/openapi.yaml
