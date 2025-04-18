#!/bin/bash

source ./bashscripts/lib/custom.sh
# Validate input
if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
fi

# Input parameters
LOCAL_PATH="$1"
LOCAL_PATH_bak="$LOCAL_PATH"_bak
REMOTE_REPO="$2"
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"



if(! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1)
then
    handle_error "Remote repository $REMOTE_REPO not found"
fi

# Sync subtree
push_subtree() {
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    git add -A
    git commit -am "."
    git push -u origin "$REMOTE_BRANCH"


    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    git checkout -b $TEMP_BRANCH
    git filter-branch --prune-empty --subdirectory-filter "$LOCAL_PATH" HEAD

    # Crea un singolo commit con il contenuto attuale
    git reset $(git commit-tree HEAD^{tree} -m "Unico commit del subtree")

    # Push al repository remoto
    git push "$REMOTE_REPO" HEAD:"$REMOTE_BRANCH"

    # Torna al branch originale e rimuovi quello temporaneo
    git checkout -
    git branch -D $TEMP_BRANCH
    




    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    #git rebase --preserve-merges "$REMOTE_BRANCH"
}

# Run sync
push_subtree

echo "👍 Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"