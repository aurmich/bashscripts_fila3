#!/bin/bash

<<<<<<< HEAD
# 🚀 Importa le funzioni di utilità
source ./bashscripts/lib/custom.sh

# ✅ Validazione input
if [ $# -ne 3 ]; then
    echo "❌ Errore: parametri mancanti"
    echo "👉 Uso: $0 <path> <remote_repo> <branch>"
    exit 1
fi

# 📌 Configurazione
LOCAL_PATH="$1"
REMOTE_REPO="$2"
BRANCH="$3"
CURR_DIR=$(pwd)

# 🎯 Log iniziale
echo "🚀 Inizio push subtree"
echo "📁 Path locale: $LOCAL_PATH"
echo "🌐 Repository remoto: $REMOTE_REPO"
echo "🌿 Branch: $BRANCH"

# 🔄 Setup repository
cd "$LOCAL_PATH" || { echo "❌ Impossibile accedere a $LOCAL_PATH"; exit 1; }
git init || { echo "❌ Errore nell'inizializzazione git"; exit 1; }
git checkout -b "$BRANCH" || { echo "❌ Errore nella creazione del branch"; exit 1; }

# 🔗 Configurazione remoto
git remote add origin "$REMOTE_REPO" || { echo "❌ Errore nell'aggiunta del remote"; exit 1; }
git fetch --all || { echo "❌ Errore nel fetch"; exit 1; }

# 💾 Commit e push
git add -A || { echo "❌ Errore nell'add"; exit 1; }
git commit -am "🔧 Aggiornamento subtree" || { echo "'❌ Errore nel commit"; exit 1; }
git merge origin/"$BRANCH" --allow-unrelated-histories || { echo "❌ Errore nel merge"; exit 1; }
git add -A || { echo "❌ Errore nell'add post-merge"; exit 1; }
git commit -am "🔄 Merge subtree" || { echo "❌ Errore nel commit post-merge"; exit 1; }
git push -u origin "$BRANCH" || { echo "❌ Errore nel push"; exit 1; }

# 🧹 Pulizia
rm -rf .git || { echo "⚠️ Attenzione: impossibile rimuovere .git"; }
cd "$CURR_DIR" || { echo "⚠️ Attenzione: impossibile tornare alla directory originale"; }

echo "✅ Push subtree completato con successo!"
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
LOCAL_PATH_bak="$LOCAL_PATH"_bak
REMOTE_REPO="$2"
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌿 Branch: $BRANCH"
echo "  🌿 Temporary branch: $TEMP_BRANCH"


=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
LOCAL_PATH_bak="$LOCAL_PATH"_bak
REMOTE_REPO="$2"
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

<<<<<<< HEAD
=======

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"


<<<<<<< HEAD
=======
=======
REMOTE_REPO="$2"
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp
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

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"
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
push_subtree() {
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    git add -A
    git commit -am "."
<<<<<<< HEAD
    git push -u origin "$REMOTE_BRANCH"
    
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    if(! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")
    then
        handle_error "Failed to push subtree $LOCAL_PATH to $REMOTE_REPO"
    fi

    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH"
=======
<<<<<<< HEAD
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
    git fetch --depth=1 "$REMOTE_REPO" "$BRANCH"
    #--squash  non esiste
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
=======
    git push -u origin "$REMOTE_BRANCH"
<<<<<<< HEAD


=======
<<<<<<< HEAD


=======
    
    
>>>>>>> origin/dev
>>>>>>> origin/dev
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;


    if(! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")
    then
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
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
<<<<<<< HEAD
=======
=======
        handle_error "Failed to push subtree $LOCAL_PATH to $REMOTE_REPO"
    #    if(! git push  "$REMOTE_REPO" $(git subtree split --prefix="$LOCAL_PATH"):"$REMOTE_BRANCH")
    #    then
    #        # First, split the subtree to a temporary branch
    #        git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"

    #        # Then force push that branch
    #        git push -f "$REMOTE_REPO" "$TEMP_BRANCH":"$REMOTE_BRANCH"
>>>>>>> origin/dev
>>>>>>> origin/dev

    #        # Optionally, clean up the temporary branch
    #        git branch -D "$TEMP_BRANCH"

    #        git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev

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
<<<<<<< HEAD
=======
=======
    #    fi
    fi


    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH"
    #git rebase --preserve-merges "$REMOTE_BRANCH" 
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
}

# Run sync
push_subtree

echo "👍 Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"
>>>>>>> origin/dev
