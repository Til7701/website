#!/bin/sh

set -e

pandoc --version

SRC_DIR="src/markdown"
TARGET_DIR="site/php/templates/from-markdown"
CONTENT_TEMPLATE_FILE="src/html/content_template.html"
TOC_TEMPLATE_FILE="src/html/toc_template.html"

if [ ! -f "$CONTENT_TEMPLATE_FILE" ]; then
    echo "Template file '$CONTENT_TEMPLATE_FILE' not found!"
    exit 1
fi
if [ ! -f "$TOC_TEMPLATE_FILE" ]; then
    echo "Template file '$TOC_TEMPLATE_FILE' not found!"
    exit 1
fi

rm -rf "$TARGET_DIR"
mkdir -p "$TARGET_DIR"

find "$SRC_DIR" -type f -name "*.md" | while read -r md_file; do
    rel_path="${md_file#"$SRC_DIR"/}"
    base_name="${rel_path%.md}"
    out_dir="$TARGET_DIR/$(dirname "$base_name")"
    content_html_file="$TARGET_DIR/${base_name}_content.html"
    toc_html_file="$TARGET_DIR/${base_name}_toc.html"

    mkdir -p "$out_dir"

    echo "Converting $md_file to $content_html_file using $CONTENT_TEMPLATE_FILE..."

    pandoc "$md_file" \
      --template="$CONTENT_TEMPLATE_FILE" \
      -s \
      --table-of-contents \
      --toc-depth=4 \
      --embed-resources \
      --strip-comments \
       --lua-filter="src/pandoc/filters/wrap-tables.lua" \
      -o "$content_html_file"

    echo "Converting $md_file to $toc_html_file using $TOC_TEMPLATE_FILE..."

    pandoc "$md_file" \
      --template="$TOC_TEMPLATE_FILE" \
      -s \
      --table-of-contents \
      --toc-depth=4 \
      --embed-resources \
      --strip-comments \
       --lua-filter="src/pandoc/filters/wrap-tables.lua" \
      -o "$toc_html_file"
done

echo "All Markdown files have been converted to HTML in $TARGET_DIR using the custom template."
