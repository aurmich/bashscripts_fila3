#!/bin/bash

source ./bashscripts/lib/custom.sh

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (2 linee vs 1)[0m
# Validate input
if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
fi

# Input parameters
LOCAL_PATH="$1"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m
LOCAL_PATH_bak="$LOCAL_PATH"_bak
REMOTE_REPO="$2"
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

REMOTE_REPO="$2"
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (4 linee vs 1)[0m
# Simple error handling function
die() {
    echo "$1" >&2
    exit 1
}

# Funzione per loggare messaggi
log() {
    local message="$1"
    echo "$(date '+%Y-%m-%d %H:%M:%S') - $message" | tee -a "$LOG_FILE"
}

# Funzione per gestire gli errori
handle_error() {
    local error_message="$1"
    log "❌ Errore: $error_message"
    exit 1
}

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (6 linee vs 1)[0m

if(! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1)
then
    handle_error "Remote repository $REMOTE_REPO not found"
fi

# Sync subtree
push_subtree() {
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    git add -A
    git commit -am "."


    
    

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (5 linee vs 1)[0m
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;


    if(! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")
    then

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m
        log "❌ Failed to push subtree $LOCAL_PATH to $REMOTE_REPO"
        if(! git push  "$REMOTE_REPO" $(git subtree split --prefix="$LOCAL_PATH"):"$REMOTE_BRANCH")
        then
            log "❌ Failed split  to push subtree $LOCAL_PATH to $REMOTE_REPO"

            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"
            # Ora fai il merge del branch temporaneo con `git subtree merge`
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || echo "❌ Failed to merge subtree"
            # Pulisci il branch temporaneo
            git branch -D "$TEMP_BRANCH" || echo "❌ Failed to delete temporary branch $TEMP_BRANCH"
    #        # First, split the subtree to a temporary branch
        #    git subtree split --prefix="$LOCAL_PATH" --rejoin -b "$TEMP_BRANCH"

    #        # Then force push that branch
        #    git push "$REMOTE_REPO" "$TEMP_BRANCH":"$REMOTE_BRANCH"
        handle_error "Failed to push subtree $LOCAL_PATH to $REMOTE_REPO"
    #    if(! git push  "$REMOTE_REPO" $(git subtree split --prefix="$LOCAL_PATH"):"$REMOTE_BRANCH")
    #    then
    #        # First, split the subtree to a temporary branch
    #        git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"

    #        # Then force push that branch
    #        git push -f "$REMOTE_REPO" "$TEMP_BRANCH":"$REMOTE_BRANCH"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (9 linee vs 1)[0m

    #        # Optionally, clean up the temporary branch
    #        git branch -D "$TEMP_BRANCH"

    #        git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m

            #mv "$LOCAL_PATH" "$LOCAL_PATH_bak" || die "Failed to rename $LOCAL_PATH to $LOCAL_PATH_bak"
            #git add .
            #git commit -am "Add $LOCAL_PATH_bak"
            #git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
             # Sincronizza i file dalla cartella di backup
            #rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"

            # Rimuovi la cartella di backup
            #rm -rf "$LOCAL_PATH_bak" || die "Failed to remove backup folder"
            # Commit delle modifiche
            #git add . || die "Failed to add changes after submodule sync"
            #git commit -am "Added submodule for $LOCAL_PATH" || die "Failed to commit submodule changes"
        fi
    fi


    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    #git rebase --preserve-merges "$REMOTE_BRANCH"
    #    fi
    fi


    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH"
    #git rebase --preserve-merges "$REMOTE_BRANCH" 

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (7 linee vs 1)[0m
}

# Run sync
push_subtree

echo "👍 Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"
