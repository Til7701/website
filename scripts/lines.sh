#!/bin/bash

set -e

width=26
height=12
factor=50

for (( i = 0; i < width; i++ )); do
    for (( j = 0; j < height; j++ )); do
        if (( RANDOM % 2 )); then
            if (( RANDOM % 2 == 0 )); then
                echo "<line x1=\"$((i * factor))\" y1=\"$((j * factor))\" x2=\"$(((i + 1) * factor))\" y2=\"$((j * factor))\"/>"
            fi
            if (( RANDOM % 2 == 0 )); then
                echo "<line x1=\"$((i * factor))\" y1=\"$((j * factor))\" x2=\"$((i * factor))\" y2=\"$(((j + 1) * factor))\"/>"
            fi
        fi
    done
done
