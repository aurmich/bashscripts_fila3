#!/bin/bash

LOG_FILE="subtree_sync.log"
BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
LOG_FILE="subtree_sync.log"

# Funzione per loggare messaggi
log() {
    local message="$1"
    #echo "📆 $(date '+%Y-%m-%d %H:%M:%S') - $message" | tee -a "$LOG_FILE"
    echo "📆 $(date '+%Y-%m-%d %H:%M:%S') - $message"
}

# Funzione per gestire gli errori
handle_error() {
    local error_message="$1"
    log "❌ Errore: $error_message"
    exit 1
}

# Simple error handling function
die() {
    echo "$1" >&2
    exit 1
}



# Funzione per riscrivere la URL secondo le regole specificate
rewrite_url() {
    local original_url="$1"
    local org="$2"

    # Estrai solo il nome del repository (ultimo componente dopo lo slash)
    repo_name=$(basename "$original_url")

    if [[ "$org" == *"/"* ]]; then
        # ORG contiene uno slash → usa direttamente come prefisso
        echo "${org}/${repo_name}"
    else
        # ORG è un'organizzazione GitHub → usa formato GitHub SSH
        echo "git@github.com:${org}/${repo_name}"
    fi
}

# Git maintenance
git_maintenance() {
    log "Eseguo manutenzione del repository git..."
    
    # Pulizia e ottimizzazione
    git gc --aggressive --prune=now
    git reflog expire --expire=now --all
    
    # Rimozione branch remoti non più esistenti
    git remote prune origin
    
    # Pulizia dei file non tracciati
    git clean -fd
    
    # Verifica integrità repository
    git fsck --full --strict

    # Ottimizzazione specifica per subtree
    #log "Ottimizzazione subtree..."
    #git filter-branch --prune-empty --subdirectory-filter "$LOCAL_PATH" "$BRANCH" || true
    #git for-each-ref --format="%(refname)" refs/original/ | xargs -n 1 git update-ref -d
}


backup_disk() {
    # Richiesta interattiva della lettera del disco
    read -p "📀 Inserisci la lettera del disco per il backup [d]: " DISK_LETTER
    DISK_LETTER=${DISK_LETTER:-"d"}  # Se non specificato, usa 'd' come default
    # Backup to disk
    if ! ./bashscripts/sync_to_disk.sh "$DISK_LETTER" ; then
        handle_error "Failed to sync to disk $DISK_LETTER"
    fi

    echo "  💾 Backup Disk: $DISK_LETTER"
}

# Funzione per configurare le impostazioni git
git_config_setup() {
    log "🔧 Configurazione git di base..."
    git config core.ignorecase false        # Gestione case-sensitive dei file
    git config core.fileMode false          # Ignora i permessi dei file
    git config core.autocrlf false          # Non convertire automaticamente i line endings
    git config core.eol lf                  # Usa LF come line ending di default
    git config core.symlinks false          # Gestione symlinks disabilitata per Windows
    git config core.longpaths true          # Supporto per path lunghi su Windows
    log "✅ Configurazione git completata"
}

git_delete_history(){
    local branch="$1"
    git checkout --orphan newBranch$branch
    git add --renormalize -A
    git add -A  # Add all files and commit them
    git commit -am "first"
    git branch -D $branch  # Deletes the $1 branch
    git branch -m $branch  # Rename the current branch to $1
    git gc --aggressive --prune=all     # remove the old files
    git push -uf origin $branch  # Force push $1 branch to github
    git gc --aggressive --prune=all     # remove the old files
    git gc --auto
}