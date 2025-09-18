#!/bin/bash

source ./bashscripts/lib/custom.sh
# Validate input
<<<<<<< HEAD
if [ $# -ne 3 ]; then
    echo "Usage: $0 <path> <remote_repo> <branch>"
=======
if [ $# -lt 2 ] || [ $# -gt 3 ]; then
    log "error" "Parametri errati"
    log "info" "Uso: $0 <path> <remote_repo> [branch]"
>>>>>>> e47821df (.)
    exit 1
fi

LOCAL_PATH="$1"
REMOTE_REPO="$2"
<<<<<<< HEAD
BRANCH="$3"
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
=======
BRANCH="${3:-main}"  # Usa il terzo parametro se fornito, altrimenti "main"
curr_dir=$(pwd)

log "info" "🔄 Submodule $LOCAL_PATH"
log "info" "🌐 Remote repo $REMOTE_REPO"
log "info" "🌿 Branch $BRANCH"
log "info" "🔄 Current dir $curr_dir"

cd "$LOCAL_PATH" || handle_error "Impossibile accedere a $LOCAL_PATH"
git init || handle_git_error "git init" "Impossibile inizializzare il repository"
git checkout -b "$BRANCH" || handle_git_error "git checkout" "Impossibile creare il branch $BRANCH"
git remote add origin "$REMOTE_REPO" || handle_git_error "git remote add" "Impossibile aggiungere il remote origin"
git fetch --all || handle_git_error "git fetch" "Impossibile eseguire fetch"
git add -A
git commit -am "Initial commit" || true  # Non fallire se non ci sono cambiamenti
git merge origin/"$BRANCH" --allow-unrelated-histories || handle_git_error "git merge" "Impossibile eseguire merge con origin/$BRANCH"
git add -A
git commit -am "Merge from origin" || true  # Non fallire se non ci sono cambiamenti
git push -u origin "$BRANCH" || handle_git_error "git push" "Impossibile eseguire push"

# Pulizia
rm -rf .git

# Ritorno alla directory originale
cd "$curr_dir" || handle_error "Impossibile tornare alla directory originale"

log "success" "👍 Pull ORG completato"
>>>>>>> e47821df (.)
