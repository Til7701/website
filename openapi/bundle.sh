#!/bin/sh

set -e

UID=$(id -u)
GID=$(id -g)

docker run --rm \
  -u "${UID}":"${GID}" \
  -v "${PWD}":/local \
   openapitools/openapi-generator-cli:v7.17.0 generate \
  -g openapi-yaml \
  -i /local/src/openapi.yaml \
  -o /local/target/bundle

  docker run --rm \
    -u "${UID}":"${GID}" \
    -v "${PWD}":/local \
     openapitools/openapi-generator-cli:v7.17.0 generate \
    -g openapi \
    -i /local/src/openapi.yaml \
    -o /local/target/bundle

cp target/bundle/openapi/openapi.yaml ../site/api/v1/openapi.yaml
cp target/bundle/openapi.json ../site/api/v1/openapi.json
