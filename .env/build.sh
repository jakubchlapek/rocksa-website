#! /bin/bash

DIR=$(dirname "$0")

source $DIR/dockerhub.env

docker build -t $CONTAINER_BASE \
    --build-arg USER=$(id -u -n) \
    --build-arg UID=$(id -u) \
    --build-arg GROUP=$(id -g -n) \
    --build-arg GID=$(id -g) \
    --build-arg DOCKER_GROUP=docker \
    --build-arg DOCKER_GID=$(getent group docker | cut -d: -f3) \
    --file $DIR/Dockerfile.base . \
    || exit 1

docker build -t $CONTAINER_BUILD \
    --build-arg FROM=$CONTAINER_BASE \
    --file $DIR/Dockerfile.build . \
    || exit 1

docker build -t $CONTAINER_DEV \
    --build-arg FROM=$CONTAINER_BUILD \
    --file $DIR/Dockerfile.dev . \
    || exit 1

docker build -t $CONTAINER_IDE \
    --build-arg FROM=$CONTAINER_DEV \
    --file $DIR/Dockerfile.ide . \
    || exit 1

docker build -t $CONTAINER_NOTES \
    --build-arg FROM=$CONTAINER_IDE \
    --file $DIR/Dockerfile.notes . \
    || exit 1

