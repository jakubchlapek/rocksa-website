#! /bin/bash

DIR=$(dirname "$0")

source $DIR/dockerhub.env

docker push $CONTAINER_BASE
docker push $CONTAINER_BUILD
docker push $CONTAINER_DEV
docker push $CONTAINER_IDE
docker push $CONTAINER_NOTES

