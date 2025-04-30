#!/bin/bash

source ./bashscripts/lib/custom.sh

<<<<<<< HEAD
=======

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (3 linee vs 1)[0m
>>>>>>> d2064db (.)
# Validate input
if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
fi

# Input parameters
LOCAL_PATH="$1"
LOCAL_PATH_bak="$LOCAL_PATH"_bak
REMOTE_REPO="$2"
<<<<<<< HEAD
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌿 Branch: $BRANCH"
echo "  🌿 Temporary branch: $TEMP_BRANCH"
=======

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco incoming (1 linee vs 1)[0m
LOG_FILE="subtree_sync.log"


echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"



[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (2 linee vs 1)[0m
>>>>>>> d2064db (.)


# Verifica se il path esiste
if [ ! -e "$LOCAL_PATH" ]; then
    handle_error "Il path $LOCAL_PATH non esiste"
fi

<<<<<<< HEAD
# Verifica se il path esiste
if [ ! -e "$LOCAL_PATH" ]; then
    handle_error "Errore: Il path $LOCAL_PATH non esiste"
fi

=======
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

>>>>>>> d2064db (.)
if(! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1)
then
    handle_error "Remote repository $REMOTE_REPO not found"
fi

# Sync subtree
pull_subtree() {
<<<<<<< HEAD
    # Cross-platform compatibility settings
    git config core.ignorecase false        # Gestione case-sensitive dei file
    git config core.fileMode false          # Ignora i permessi dei file
    git config core.autocrlf false          # Non convertire automaticamente i line endings
    git config core.eol lf                  # Usa LF come line ending di default
    git config core.symlinks false          # Gestione symlinks disabilitata per Windows
    git config core.longpaths true          # Supporto per path lunghi su Windows
=======
    git_config_setup
>>>>>>> d2064db (.)

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
<<<<<<< HEAD
=======

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
>>>>>>> d2064db (.)
}

# Run sync
pull_subtree

<<<<<<< HEAD
log "Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"
=======
log "Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"
echo "👍Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"

[0;34mℹ️ [2025-04-22 11:23:27] Scelto blocco HEAD (3 linee vs 1)[0m
>>>>>>> d2064db (.)
