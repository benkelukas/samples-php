#!/usr/bin/env bash

docker run \
  --rm \
   --interactive \
   --tty \
   --volume "${PWD}":/workspace \
   --workdir /workspace \
   docker.artifactory.futurenet.com/futureapis/protoc-plugins/buf:latest \
   generate --debug --template buf.gen.yaml