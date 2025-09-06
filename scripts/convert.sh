#!/bin/bash

set -e

SRC_DIR="src/markdown"
TARGET_DIR="site/php/templates/from-markdown"
TEMPLATE_FILE="src/html/template.html"

if [ ! -f "$TEMPLATE_FILE" ]; then
    echo "Template file '$TEMPLATE_FILE' not found!"
    exit 1
fi

mkdir -p "$TARGET_DIR"

find "$SRC_DIR" -type f -name "*.md" | while read -r md_file; do
    rel_path="${md_file#"$SRC_DIR"/}"
    base_name="${rel_path%.md}"
    out_dir="$TARGET_DIR/$(dirname "$base_name")"
    html_file="$TARGET_DIR/${base_name}.html"

    mkdir -p "$out_dir"

    echo "Converting $md_file to $html_file using $TEMPLATE_FILE..."

    pandoc "$md_file" --template="$TEMPLATE_FILE" -s --table-of-contents=true -o "$html_file"
done

echo "All Markdown files have been converted to HTML in $TARGET_DIR using the custom template."
