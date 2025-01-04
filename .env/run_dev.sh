#! /bin/bash

DIR=$(dirname "$0")
ARGS="${@:1}"

source $DIR/dockerhub.env

$DIR/run.sh $TAG_DEV $CONTAINER_DEV $ARGS

