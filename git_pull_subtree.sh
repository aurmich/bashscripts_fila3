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
LOG_FILE="subtree_sync.log"

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"

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

# Verifica se il path esiste
if [ ! -e "$LOCAL_PATH" ]; then
    handle_error "Il path $LOCAL_PATH non esiste"
fi

if(! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1)
then
    handle_error "Remote repository $REMOTE_REPO not found"
fi

# Sync subtree
pull_subtree() {
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    git add -A
    git commit -am "."
    git push -u origin "$REMOTE_BRANCH"

    git config core.ignorecase false
    git config core.fileMode false

    git fetch "$REMOTE_REPO" "$REMOTE_BRANCH" --depth=1
    if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"  --squash)
    then
        echo "------------------------- 1 -------------------------"
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")    
        then
            echo "------------------------- 2 -------------------------"
            # First, split the subtree to a temporary branch
            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"
            # Ora fai il merge del branch temporaneo con `git subtree merge`
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || echo "Failed to merge subtree"
            # Pulisci il branch temporaneo
            git branch -D "$TEMP_BRANCH" || echo "Failed to delete temporary branch"

            # Aggiungi il submodule (aggiungiamo il submodule da un repository remoto)
            mv "$LOCAL_PATH" "$LOCAL_PATH_bak" || die "Failed to rename $LOCAL_PATH to $LOCAL_PATH_bak"
            git add .
            git commit -am "Add $LOCAL_PATH_bak"
            git push -u origin "$REMOTE_BRANCH"

            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
            # Sincronizza i file dalla cartella di backup
            rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"

            # Rimuovi la cartella di backup
            rm -rf "$LOCAL_PATH_bak" || die "Failed to remove backup folder"
            # Commit delle modifiche
            git add . || die "Failed to add changes after submodule sync"
            git commit -am "Added submodule for $LOCAL_PATH" || die "Failed to commit submodule changes"
            git push -u origin "$REMOTE_BRANCH"
        fi
    fi

    # Manutenzione avanzata repository
    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    git_maintenance
}

# Run sync
pull_subtree

echo "Subtree $LOCAL_PATH pulled successfully from $REMOTE_REPO"
