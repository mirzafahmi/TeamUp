#!/usr/bin/env sh

# Temporary directory for initialization
TEMP_DIR="/tmp/storage_init"

# Ensure the temporary directory exists
mkdir -p "$TEMP_DIR"

# Check if the volume is empty
if [ ! "$(ls -A /var/www/html/storage/app/public)" ]; then
    echo "Initializing volume with default data..."
    # Copy data from temporary directory to the volume
    cp -r "$TEMP_DIR/"* /var/www/html/storage/app/public/
else
    echo "Volume already initialized."
fi

# Clean up temporary directory
rm -rf "$TEMP_DIR"
