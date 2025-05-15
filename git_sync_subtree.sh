#!/bin/bash

source ./bashscripts/lib/custom.sh

# 🎨 Colori per il logging
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# 📝 Funzione di logging
log() {
    local level="$1"
    local message="$2"
    case "$level" in
        "error") echo -e "${RED}❌ $message${NC}" ;;
        "success") echo -e "${GREEN}✅ $message${NC}" ;;
        "warning") echo -e "${YELLOW}⚠️ $message${NC}" ;;
        "info") echo -e "ℹ️ $message" ;;
    esac
}

# ✅ Validazione input
if [ $# -ne 2 ]; then
    log "error" "Parametri mancanti"
    log "info" "Uso: $0 <path> <remote_repo>"
    exit 1
fi

# 📌 Configurazione
me=$(readlink -f -- "$0")
script_dir=$(dirname "$me")
LOCAL_PATH="$1"
REMOTE_REPO="$2"
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

# 🔄 Funzione per sincronizzare il subtree
sync_subtree() {
    log "info" "Inizio sincronizzazione subtree"
    
    # 🧹 Normalizzazione script
    sed -i -e 's/\r$//' "$script_dir/git_push_subtree.sh" || handle_git_error "normalizzazione" "Errore nella normalizzazione push script"
    sed -i -e 's/\r$//' "$script_dir/git_pull_subtree.sh" || handle_git_error "normalizzazione" "Errore nella normalizzazione pull script"
    
    # 🔒 Impostazione permessi
    chmod +x "$script_dir/git_push_subtree.sh" || handle_git_error "permessi" "Errore nell'impostazione permessi push script"
    chmod +x "$script_dir/git_pull_subtree.sh" || handle_git_error "permessi" "Errore nell'impostazione permessi pull script"
    
    # 📤 Push subtree
    log "info" "Esecuzione push subtree"
    if ! "$script_dir/git_push_subtree.sh" "$LOCAL_PATH" "$REMOTE_REPO"; then
        log "warning" "Push fallita per $LOCAL_PATH"
    fi
    
    # 📥 Pull subtree
    log "info" "Esecuzione pull subtree"
    if ! "$script_dir/git_pull_subtree.sh" "$LOCAL_PATH" "$REMOTE_REPO"; then
        log "warning" "Pull fallita per $LOCAL_PATH"
    fi

    # 🧹 Pulizia file di sistema
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    # 🔄 Sincronizzazione avanzata
    git fetch "$REMOTE_REPO" "$BRANCH" --depth=1
    git merge -s subtree FETCH_HEAD --allow-unrelated-histories

    # 📤 Push forzato del subtree
    git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"
    git push -f "$REMOTE_REPO" "$TEMP_BRANCH":"$BRANCH"
    git branch -D "$TEMP_BRANCH"
}

# 🚀 Esecuzione sincronizzazione
sync_subtree

# 🧹 Normalizzazione script stesso
sed -i -e 's/\r$//' "$me" || handle_git_error "normalizzazione" "Errore nella normalizzazione dello script principale"

log "success" "Subtree $LOCAL_PATH sincronizzato con successo con $REMOTE_REPO"
