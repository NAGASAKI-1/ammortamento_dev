#!/bin/bash

# Configuration
SOURCE_DIR="."
DEST_DIR="/var/www/bitlabs.ddns.net/ammortamento/"
IGNORE_FILE=".devignore"

# Check if destination directory exists
if [ ! -d "$DEST_DIR" ]; then
    echo "Error: Destination directory $DEST_DIR does not exist."
    exit 1
fi

# Build rsync command arguments
RSYNC_ARGS="-av --delete"

# Include --exclude-from if .devignore exists
if [ -f "$IGNORE_FILE" ]; then
    echo "Using ignore rules from $IGNORE_FILE..."
    RSYNC_ARGS="$RSYNC_ARGS --exclude-from=$IGNORE_FILE"
else
    echo "No $IGNORE_FILE found. Deploying all files."
fi

# Run rsync (using sudo since /srv/http is usually owned by root)
echo "Deploying from $SOURCE_DIR to $DEST_DIR..."
sudo rsync $RSYNC_ARGS "$SOURCE_DIR/" "$DEST_DIR/"

echo "Deployment complete!"