#!/bin/zsh

set -e

set -o allexport
source scripts/.env
set +o allexport

set ftp:ssl-force true
set ftp:ssl-protect-data true
set ftp:passive-mode yes

LOCAL_DIR="site"

echo "Uploading..."
lftp -u "$FTP_USER","$FTP_SECRET" "$FTP_HOST" <<EOF
mirror --reverse --verbose --delete --parallel=2 "$LOCAL_DIR" /
quit
EOF
