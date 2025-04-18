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
echo "  🌿 Branch: $REMOTE_BRANCH"
echo "  🌿 Temporary branch: $TEMP_BRANCH"



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

    ############################################
    #if(! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH")
    #then
    #    log "✅ Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"
    #else
    #    log "❌ Fallimento push subtree $LOCAL_PATH verso $REMOTE_REPO"
    #fi
    ############################################
    git fetch "$REMOTE_REPO" "$REMOTE_BRANCH"
    git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH" || log "❌ Failed to split subtree"
    #git push "$REMOTE_REPO"  "$TEMP_BRANCH":"$REMOTE_BRANCH" || log "❌ Failed to push subtree"
    # Creare un singolo commit con solo l'ultimo stato del sottoalbero
    TREE=$(git commit-tree $(git rev-parse "$TEMP_BRANCH"^{tree}) -m "Aggiornamento $LOCAL_PATH")

    # Spingere il singolo commit sulla branch remota
    git push "$REMOTE_REPO" "$TREE":"$REMOTE_BRANCH" || { echo "❌ Failed to push subtree"; exit 1; }


    git branch -D "$TEMP_BRANCH" || log "❌ Failed to delete temporary branch $TEMP_BRANCH"



    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    #git rebase --preserve-merges "$REMOTE_BRANCH"
}

# Run sync
push_subtree

echo "👍 Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"