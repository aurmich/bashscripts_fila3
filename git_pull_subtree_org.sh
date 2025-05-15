#!/bin/bash

source ./bashscripts/lib/custom.sh
# Validate input
<<<<<<< HEAD
if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
=======
if [ $# -ne 3 ]; then
    echo "Usage: $0 <path> <remote_repo> <branch>"
>>>>>>> 43df3e0 (.)
    exit 1
fi

LOCAL_PATH="$1"
REMOTE_REPO="$2"
<<<<<<< HEAD
=======
BRANCH="$3"
>>>>>>> 43df3e0 (.)
curr_dir=$(pwd)

echo "🔄 Submodule $LOCAL_PATH"
echo "🌐 Remote repo $REMOTE_REPO"
echo "🌿 Branch $BRANCH"
echo "🔄 Current dir $curr_dir"
cd "$LOCAL_PATH"
git init
git checkout -b "$BRANCH"
git remote add origin "$REMOTE_REPO"
git fetch --all
git add -A
git commit -am .
git merge origin/"$BRANCH" --allow-unrelated-histories
git add -A
git commit -am .
git push -u origin "$BRANCH"
rm -rf .git
cd "$curr_dir"
echo "👍 Pull ORG completato"