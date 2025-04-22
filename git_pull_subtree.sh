#!/bin/bash

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

# 🚀 Importa funzioni di utilità
source ./bashscripts/lib/custom.sh

# ✅ Validazione input
if [ $# -ne 2 ]; then
    log "error" "Parametri mancanti"
    log "info" "Uso: $0 <path> <remote_repo>"
    exit 1
fi

# 📌 Configurazione
LOCAL_PATH="$1"
LOCAL_PATH_BAK="${LOCAL_PATH}_bak"
REMOTE_REPO="$2"
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

# 🔍 Verifica prerequisiti
if [ ! -e "$LOCAL_PATH" ]; then
    handle_git_error "verifica path" "Il path $LOCAL_PATH non esiste"
fi

if ! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1; then
    handle_git_error "verifica remote" "Repository remoto $REMOTE_REPO non trovato"
fi

# 🔄 Funzione per il pull del subtree
pull_subtree() {
    log "info" "Inizio pull subtree"
    
    # 🛠️ Setup iniziale
    git_config_setup
    
    # 🧹 Pulizia file temporanei
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    
    # 💾 Commit locale
    git add -A || handle_git_error "add" "Errore nell'add"
    git commit -am "🔄 Aggiornamento subtree" || handle_git_error "commit" "Errore nel commit"
    git push -u origin "$REMOTE_BRANCH" || handle_git_error "push" "Errore nel push"
    
    # 📥 Pull subtree
    log "info" "Tentativo pull subtree standard"
    if ! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash; then
        log "warning" "Pull standard fallito, tentativo alternativo"
        
        if ! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"; then
            log "warning" "Pull alternativo fallito, procedo con split e merge"
            
            # 🔄 Split e merge
            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH" || handle_git_error "split" "Errore nello split"
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || handle_git_error "merge" "Errore nel merge"
            git branch -D "$TEMP_BRANCH" || log "warning" "Impossibile eliminare branch temporaneo"
            
            # 📦 Backup e ripristino
            mv "$LOCAL_PATH" "$LOCAL_PATH_BAK" || handle_git_error "backup" "Errore nel backup"
            git add . || handle_git_error "add" "Errore nell'add post-backup"
            git commit -am "📦 Backup $LOCAL_PATH" || handle_git_error "commit" "Errore nel commit backup"
            git push -u origin "$REMOTE_BRANCH" || handle_git_error "push" "Errore nel push backup"
            
            # 🔄 Ripristino
            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash || handle_git_error "add subtree" "Errore nell'add subtree"
            rsync -avz "$LOCAL_PATH_BAK/" "$LOCAL_PATH" || handle_git_error "sync" "Errore nella sincronizzazione"
            
            # 🧹 Pulizia
            rm -rf "$LOCAL_PATH_BAK" || log "warning" "Impossibile rimuovere backup"
            git add . || handle_git_error "add" "Errore nell'add finale"
            git commit -am "🔄 Ripristino subtree $LOCAL_PATH" || handle_git_error "commit" "Errore nel commit finale"
            git push -u origin "$REMOTE_BRANCH" || handle_git_error "push" "Errore nel push finale"
        fi
    fi
    
    # 🛠️ Manutenzione
    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash || log "warning" "Errore nel rebase"
    git_maintenance
}

# 🚀 Esecuzione
pull_subtree

log "success" "Subtree $LOCAL_PATH pullato con successo da $REMOTE_REPO"
