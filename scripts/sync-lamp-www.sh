#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_DIR="$(cd "$SCRIPT_DIR/.." && pwd)"
SRC_DIR="${SRC_DIR:-$REPO_DIR/www/}"
DST_DIR="${1:-${DST_DIR:-$HOME/lamp/www/}}"

if [ ! -d "$SRC_DIR" ]; then
  echo "Source directory not found: $SRC_DIR" >&2
  exit 1
fi

mkdir -p "$DST_DIR"
rsync -av --delete --exclude='.git/' "$SRC_DIR" "$DST_DIR"
