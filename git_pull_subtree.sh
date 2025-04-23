#!/bin/bash

<<<<<<< HEAD
# 🎨 Colori per il logging
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# 📝 Funzione di logging
log() {
    local level="$1"
    local message="$2"
    local timestamp=$(date '+%Y-%m-%d %H:%M:%S')
    case "$level" in
        "error") echo -e "${RED}❌ [$timestamp] $message${NC}" | tee -a "$LOG_FILE" ;;
        "success") echo -e "${GREEN}✅ [$timestamp] $message${NC}" | tee -a "$LOG_FILE" ;;
        "warning") echo -e "${YELLOW}⚠️ [$timestamp] $message${NC}" | tee -a "$LOG_FILE" ;;
        "info") echo -e "ℹ️ [$timestamp] $message" | tee -a "$LOG_FILE" ;;
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
LOG_FILE="subtree_sync.log"

# Mostra informazioni di configurazione
log "info" "📁 Path: $LOCAL_PATH"
log "info" "🌐 URL: $REMOTE_REPO"
log "info" "🌐 Branch: $REMOTE_BRANCH"
log "info" "🌐 Temporary branch: $TEMP_BRANCH"

# 🔍 Verifica prerequisiti
if [ ! -e "$LOCAL_PATH" ]; then
    log "error" "Il path $LOCAL_PATH non esiste"
    exit 1
fi

if ! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1; then
    log "error" "Repository remoto $REMOTE_REPO non trovato"
    exit 1
fi

# 🔄 Funzione per il pull del subtree
pull_subtree() {
    log "info" "Inizio pull subtree"
    
    # 🛠️ Setup iniziale
    git_config_setup
    
    # 🧹 Pulizia file temporanei
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    
    # 💾 Commit locale
    git add -A || log "warning" "Errore nell'add"
    git commit -am "🔄 Aggiornamento subtree" || log "info" "Nessun cambiamento da committare"
    git push -u origin "$REMOTE_BRANCH" || log "warning" "Errore nel push"
    
    # 📥 Pull subtree
    log "info" "Tentativo pull subtree standard"
    if ! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash; then
        log "warning" "Pull standard fallito, tentativo alternativo"
        
        if ! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"; then
            log "warning" "Pull alternativo fallito, procedo con split e merge"
            
            # 🔄 Split e merge
            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH" || log "error" "Errore nello split"
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || log "error" "Errore nel merge"
            git branch -D "$TEMP_BRANCH" || log "warning" "Impossibile eliminare branch temporaneo"
            
            # 📦 Backup e ripristino
            mv "$LOCAL_PATH" "$LOCAL_PATH_BAK" || log "error" "Errore nel backup"
            git add . || log "warning" "Errore nell'add post-backup"
            git commit -am "📦 Backup $LOCAL_PATH" || log "warning" "Errore nel commit backup"
            git push -u origin "$REMOTE_BRANCH" || log "warning" "Errore nel push backup"
            
            # 🔄 Ripristino
            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash || log "error" "Errore nell'add subtree"
            rsync -avz "$LOCAL_PATH_BAK/" "$LOCAL_PATH" || log "error" "Errore nella sincronizzazione"
            
            # 🧹 Pulizia
            rm -rf "$LOCAL_PATH_BAK" || log "warning" "Impossibile rimuovere backup"
            git add . || log "warning" "Errore nell'add finale"
            git commit -am "🔄 Ripristino subtree $LOCAL_PATH" || log "warning" "Errore nel commit finale"
            git push -u origin "$REMOTE_BRANCH" || log "warning" "Errore nel push finale"
        fi
    fi
    
    # 🛠️ Manutenzione
    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash || log "warning" "Errore nel rebase"
    git_maintenance
}

# 🚀 Esecuzione
pull_subtree

log "success" "Subtree $LOCAL_PATH pullato con successo da $REMOTE_REPO"
=======
source ./bashscripts/lib/custom.sh


[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (3 linee vs 1)[0m
# Validate input
if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
fi

# Input parameters
LOCAL_PATH="$1"
LOCAL_PATH_bak="$LOCAL_PATH"_bak
REMOTE_REPO="$2"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m
LOG_FILE="subtree_sync.log"


echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"



[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (2 linee vs 1)[0m


# Verifica se il path esiste
if [ ! -e "$LOCAL_PATH" ]; then
    handle_error "Il path $LOCAL_PATH non esiste"
fi

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m
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

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (6 linee vs 1)[0m

if(! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1)
then
    handle_error "Remote repository $REMOTE_REPO not found"
fi

# Sync subtree
pull_subtree() {
    git_config_setup

    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    git add -A
    git commit -am "."
    git push -u origin "$BRANCH"

    git fetch "$REMOTE_REPO" "$BRANCH" --depth=1
    if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH"  --squash)
    then
        log "Primo tentativo di subtree pull fallito, provo una strategia alternativa..."
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH")
        then
            log "Secondo tentativo fallito, procedo con split e merge..."
            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || log "Failed to merge subtree"
            git branch -D "$TEMP_BRANCH" || log "Failed to delete temporary branch $TEMP_BRANCH"

            mv "$LOCAL_PATH" "$LOCAL_PATH_bak" || die "Failed to rename $LOCAL_PATH to $LOCAL_PATH_bak"
            git add .
            git commit -am "Add $LOCAL_PATH_bak"
            git push -u origin "$BRANCH"

            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH" --squash
            rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"

            rm -rf "$LOCAL_PATH_bak" || die "Failed to remove backup folder"
            git add . || die "Failed to add changes after submodule sync"
            git commit -am "Added submodule for $LOCAL_PATH" || die "Failed to commit submodule changes"
            git push -u origin "$BRANCH"
        fi
    fi

    # Manutenzione avanzata repository
    git rebase --rebase-merges --strategy subtree "$BRANCH" --autosquash
    git_maintenance

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (37 linee vs 1)[0m
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    git add -A
    git commit -am "."
    git push -u origin "$REMOTE_BRANCH"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m

    git config core.ignorecase false
    git config core.fileMode false

    

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (2 linee vs 1)[0m
    git fetch "$REMOTE_REPO" "$REMOTE_BRANCH" --depth=1
    if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"  --squash)
    then
        echo "------------------------- 1 -------------------------"
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")    

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (3 linee vs 1)[0m
        then
            echo "------------------------- 2 -------------------------"
            #git fetch "$REMOTE_REPO" "$REMOTE_BRANCH" --depth=1
            #git merge -s subtree FETCH_HEAD  --allow-unrelated-histories
            # First, split the subtree to a temporary branch
            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"
            # Ora fai il merge del branch temporaneo con `git subtree merge`
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || echo "Failed to merge subtree"
            # Pulisci il branch temporaneo
            git branch -D "$TEMP_BRANCH" || echo "Failed to delete temporary branch $TEMP_BRANCH"
            git branch -D "$TEMP_BRANCH" || echo "Failed to delete temporary branch"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (3 linee vs 1)[0m

            # Aggiungi il submodule (aggiungiamo il submodule da un repository remoto)
            mv "$LOCAL_PATH" "$LOCAL_PATH_bak" || die "Failed to rename $LOCAL_PATH to $LOCAL_PATH_bak"
            git add .
            git commit -am "Add $LOCAL_PATH_bak"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m
            git push -u origin "$REMOTE_BRANCH"

            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
             # Sincronizza i file dalla cartella di backup
            rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"

            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
             # Sincronizza i file dalla cartella di backup
            rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"
        

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (5 linee vs 1)[0m
            # Rimuovi la cartella di backup
            rm -rf "$LOCAL_PATH_bak" || die "Failed to remove backup folder"
            # Commit delle modifiche
            git add . || die "Failed to add changes after submodule sync"
            git commit -am "Added submodule for $LOCAL_PATH" || die "Failed to commit submodule changes"
            git push -u origin "$REMOTE_BRANCH"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (2 linee vs 1)[0m

        fi
    fi


    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    #git rebase --preserve-merges "$REMOTE_BRANCH"
    
    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH"
    #git rebase --preserve-merges "$REMOTE_BRANCH" 

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (7 linee vs 1)[0m
}

# Run sync
pull_subtree

log "Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"
echo "👍Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (3 linee vs 1)[0m
>>>>>>> aurmich/dev
