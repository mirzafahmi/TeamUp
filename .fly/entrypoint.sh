#!/usr/bin/env sh

# Unlink the local development symlink if it exists
SYMLINK_PATH="/var/www/html/public/storage"
TARGET_PATH="/var/www/html/storage/app/public"

if [ -L "$SYMLINK_PATH" ]; then
    echo "Unlinking existing symlink at $SYMLINK_PATH..."
    unlink "$SYMLINK_PATH"
    echo "Symlink removed."
elif [ -e "$SYMLINK_PATH" ]; then
    echo "Removing existing file or directory at $SYMLINK_PATH..."
    rm -rf "$SYMLINK_PATH"
    echo "File or directory removed."
fi

# Ensure the target directory exists
if [ ! -d "$TARGET_PATH" ]; then
    echo "Creating target directory at $TARGET_PATH..."
    mkdir -p "$TARGET_PATH"
    echo "Target directory created."
fi

# Create the new symlink
if [ ! -L "$SYMLINK_PATH" ]; then
    echo "Creating new symlink from $TARGET_PATH to $SYMLINK_PATH..."
    ln -sfn "$TARGET_PATH" "$SYMLINK_PATH"
    echo "Symlink created."
fi

# Run user scripts, if they exist
for f in /var/www/html/.fly/scripts/*.sh; do
    if [ -f "$f" ]; then
        echo "Running user script $f..."
        bash "$f" -e
    fi
done

# Change ownership of the application files
chown -R www-data:www-data /var/www/html

# Execute command or start the application
if [ $# -gt 0 ]; then
    exec "$@"
else
    exec supervisord -c /etc/supervisor/supervisord.conf
fi
