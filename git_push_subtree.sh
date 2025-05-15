#!/bin/bash

<<<<<<< HEAD
# 🚀 Importa le funzioni di utilità
source ./bashscripts/lib/custom.sh

# ✅ Validazione input
if [ $# -ne 2 ]; then
    log "error" "Parametri mancanti"
    log "info" "Uso: $0 <path> <remote_repo>"
    exit 1
fi

# 📌 Configurazione
LOCAL_PATH="$1"
REMOTE_REPO="$2"

CURR_DIR=$(pwd)
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

# 🎯 Log iniziale
log "info" "Inizio push subtree"
log "info" "📁 Path locale: $LOCAL_PATH"
log "info" "🌐 Repository remoto: $REMOTE_REPO"
log "info" "🌿 Branch: $BRANCH"
log "info" "🌿 Branch temporaneo: $TEMP_BRANCH"

# 🔍 Verifica prerequisiti
if [ ! -e "$LOCAL_PATH" ]; then
    handle_git_error "verifica path" "Il path $LOCAL_PATH non esiste"
fi

if ! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1; then
    handle_git_error "verifica remote" "Repository remoto $REMOTE_REPO non trovato"
fi

# 🔄 Funzione per il push del subtree
push_subtree() {
    log "info" "Inizio push subtree"
    
    # 🛠️ Setup iniziale
    git_config_setup
    
    # 🧹 Pulizia file temporanei
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    
    # 💾 Commit locale
    git add -A || handle_git_error "add" "Errore nell'add"
    git commit -am "🔄 Aggiornamento subtree" || handle_git_error "commit" "Errore nel commit"
    git push -u origin "$BRANCH" || handle_git_error "push" "Errore nel push"
    
    # 📤 Push subtree
    log "info" "Tentativo push subtree standard"
    if ! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH"; then
        log "warning" "Push standard fallito, tentativo con split"
        
        # 🔄 Split e push
        git subtree split --rejoin --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH" || handle_git_error "split" "Errore nello split"
        git push "$REMOTE_REPO" "$TEMP_BRANCH":"$BRANCH" || handle_git_error "push" "Errore nel push del branch temporaneo"
        git branch -D "$TEMP_BRANCH" || log "warning" "Impossibile eliminare branch temporaneo"
    fi
    
    # 🛠️ Manutenzione
    git rebase --rebase-merges --strategy subtree "$BRANCH" --autosquash || log "warning" "Errore nel rebase"
    git_maintenance
}

# 🚀 Esecuzione
push_subtree

log "success" "Subtree $LOCAL_PATH pushato con successo su $REMOTE_REPO"
=======
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
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌿 Branch: $BRANCH"
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
    git push -u origin "$BRANCH"

    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    #push_subtree_v1
    split_subtree
    
    git rebase --rebase-merges --strategy subtree "$BRANCH" --autosquash
    #git rebase --preserve-merges "$BRANCH"
}

push_subtree_v1() {
    if(! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH")
    then
        log "✅ Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"
    else
        log "❌ Fallimento push subtree $LOCAL_PATH verso $REMOTE_REPO"
    fi
}


split_subtree() {
    git fetch "$REMOTE_REPO" "$BRANCH"
    if(git subtree split --rejoin --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH")
    then
        log "✅ Subtree $LOCAL_PATH splitted"
    else 
        log "❌ Failed to split subtree"
    fi
    if(git push  "$REMOTE_REPO"  "$TEMP_BRANCH":"$BRANCH")
    then
        log "✅ Subtree $LOCAL_PATH pushed to $REMOTE_REPO"
    else
        log "❌ Failed to push subtree"
    fi
    git branch -D "$TEMP_BRANCH" || log "❌ Failed to delete temporary branch $TEMP_BRANCH"
    log "✅ Subtree $LOCAL_PATH splitted and pushed to $REMOTE_REPO"
}

# Run sync
push_subtree

echo "👍 Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"
>>>>>>> 43df3e0 (.)
