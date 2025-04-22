#!/bin/bash

<<<<<<< HEAD
source ./bashscripts/lib/custom.sh

=======
<<<<<<< HEAD
source ./bashscripts/lib/custom.sh

=======
<<<<<<< HEAD
source ./bashscripts/lib/custom.sh

=======
<<<<<<< HEAD
source ./bashscripts/lib/custom.sh

=======
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
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
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp
LOG_FILE="subtree_sync.log"

=======
<<<<<<< HEAD
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌿 Branch: $BRANCH"
echo "  🌿 Temporary branch: $TEMP_BRANCH"
=======
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
LOG_FILE="subtree_sync.log"


>>>>>>> origin/dev
echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"

<<<<<<< HEAD
=======

>>>>>>> origin/dev


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
<<<<<<< HEAD
=======
=======
>>>>>>> origin/dev
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
<<<<<<< HEAD

# Verifica se il path esiste
if [ ! -e "$LOCAL_PATH" ]; then
    handle_error "Il path $LOCAL_PATH non esiste"
fi
=======
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev

if(! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1)
then
    handle_error "Remote repository $REMOTE_REPO not found"
fi

# Sync subtree
pull_subtree() {
<<<<<<< HEAD
=======
<<<<<<< HEAD
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
=======
>>>>>>> origin/dev
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    git add -A
    git commit -am "."
    git push -u origin "$REMOTE_BRANCH"
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev

    git config core.ignorecase false
    git config core.fileMode false

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
    
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
    git fetch "$REMOTE_REPO" "$REMOTE_BRANCH" --depth=1
    if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"  --squash)
    then
        echo "------------------------- 1 -------------------------"
<<<<<<< HEAD
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")    
        then
            echo "------------------------- 2 -------------------------"
=======
<<<<<<< HEAD
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")
=======
<<<<<<< HEAD
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")
=======
        if(! git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")    
>>>>>>> origin/dev
>>>>>>> origin/dev
        then
            echo "------------------------- 2 -------------------------"
            #git fetch "$REMOTE_REPO" "$REMOTE_BRANCH" --depth=1
            #git merge -s subtree FETCH_HEAD  --allow-unrelated-histories
>>>>>>> origin/dev
            # First, split the subtree to a temporary branch
            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"
            # Ora fai il merge del branch temporaneo con `git subtree merge`
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || echo "Failed to merge subtree"
            # Pulisci il branch temporaneo
<<<<<<< HEAD
            git branch -D "$TEMP_BRANCH" || echo "Failed to delete temporary branch"
=======
<<<<<<< HEAD
            git branch -D "$TEMP_BRANCH" || echo "Failed to delete temporary branch $TEMP_BRANCH"
=======
<<<<<<< HEAD
            git branch -D "$TEMP_BRANCH" || echo "Failed to delete temporary branch $TEMP_BRANCH"
=======
            git branch -D "$TEMP_BRANCH" || echo "Failed to delete temporary branch"
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev

            # Aggiungi il submodule (aggiungiamo il submodule da un repository remoto)
            mv "$LOCAL_PATH" "$LOCAL_PATH_bak" || die "Failed to rename $LOCAL_PATH to $LOCAL_PATH_bak"
            git add .
            git commit -am "Add $LOCAL_PATH_bak"
<<<<<<< HEAD
            git push -u origin "$REMOTE_BRANCH"

            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
            # Sincronizza i file dalla cartella di backup
            rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"

=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
            git push -u origin "$REMOTE_BRANCH"

            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
             # Sincronizza i file dalla cartella di backup
            rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"

<<<<<<< HEAD
=======
=======
            git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
             # Sincronizza i file dalla cartella di backup
            rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"
        
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
            # Rimuovi la cartella di backup
            rm -rf "$LOCAL_PATH_bak" || die "Failed to remove backup folder"
            # Commit delle modifiche
            git add . || die "Failed to add changes after submodule sync"
            git commit -am "Added submodule for $LOCAL_PATH" || die "Failed to commit submodule changes"
<<<<<<< HEAD
            git push -u origin "$REMOTE_BRANCH"
        fi
    fi

    # Manutenzione avanzata repository
    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    git_maintenance
=======
<<<<<<< HEAD
            git push -u origin "$REMOTE_BRANCH"
=======
<<<<<<< HEAD
            git push -u origin "$REMOTE_BRANCH"
=======
>>>>>>> origin/dev
>>>>>>> origin/dev

        fi
    fi

<<<<<<< HEAD

    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    #git rebase --preserve-merges "$REMOTE_BRANCH"
=======
<<<<<<< HEAD

    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    #git rebase --preserve-merges "$REMOTE_BRANCH"
=======
    
    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH"
    #git rebase --preserve-merges "$REMOTE_BRANCH" 
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
}

# Run sync
pull_subtree

<<<<<<< HEAD
echo "Subtree $LOCAL_PATH pulled successfully from $REMOTE_REPO"
=======
<<<<<<< HEAD
log "Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"
=======
echo "👍Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"
>>>>>>> origin/dev
>>>>>>> origin/dev
