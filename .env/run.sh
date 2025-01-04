#! /bin/bash

GIT_EMAIL=$(git config --global user.email)
GIT_USER=$(git config --global user.name)

if [ -z "$GIT_EMAIL" ] || [ -z "$GIT_USER" ]; then
    echo "Configure GIT before running containers:"
    echo ""
    echo "  git config --global user.email \"you@example.com\""
    echo "  git config --global user.name \"Your Name\""
    echo ""
    exit 1;
fi

TAG=$1
CONTAINER=$2
ARGS="${@:3}"

DIR=$(dirname "$0")

docker run --rm \
    --privileged \
    -h ${TAG} \
    -e DISPLAY \
    -e CONTAINER=${CONTAINER} \
    -v /tmp/.X11-unix:/tmp/.X11-unix:rw \
    -v /run/dbus/system_bus_socket:/run/dbus/system_bus_socket:rw \
    -e DBUS_SESSION_BUS_ADDRESS \
    -e XDG_RUNTIME_DIR \
    -v ${XDG_RUNTIME_DIR}:${XDG_RUNTIME_DIR} \
    -v $DIR/../:$DIR/../ \
    -v /var/run/docker.sock:/var/run/docker.sock:rw \
    -v $HOME/.ssh:$HOME/.ssh \
    -v $HOME/.gitconfig:$HOME/.gitconfig \
    -v $DIR/home/composer:/home/$(whoami)/.composer \
    -v $DIR/home/config/JetBrains:/home/$(whoami)/.config/JetBrains \
    -v $DIR/home/config/google-chrome-for-testing:/home/$(whoami)/.config/google-chrome-for-testing \
    -v $DIR/home/local/share/JetBrains:/home/$(whoami)/.local/share/JetBrains \
    -v $DIR/home/java:/home/$(whoami)/.java \
    -v $DIR/home/cache/JetBrains:/home/$(whoami)/.cache/JetBrains \
    -v $DIR/home/cache/google-chrome-for-testing:/home/$(whoami)/.cache/google-chrome-for-testing \
    -v $DIR/home/npm:/home/$(whoami)/.npm \
    --net=host \
    --add-host $TAG:127.0.0.1 \
    -w $DIR/../ \
    -it ${CONTAINER} ${ARGS}

