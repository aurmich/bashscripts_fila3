#!/bin/bash

<<<<<<< HEAD
# 🎨 Colori per il logging
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

LOG_FILE="subtree_sync.log"
BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")

# Funzione avanzata per loggare messaggi
log() {
    local level="$1"
    local message="$2"
    local timestamp=$(date '+%Y-%m-%d %H:%M:%S')
    
    case "$level" in
        "error") echo -e "${RED}❌ [$timestamp] $message${NC}" | tee -a "$LOG_FILE" ;;
        "success") echo -e "${GREEN}✅ [$timestamp] $message${NC}" | tee -a "$LOG_FILE" ;;
        "warning") echo -e "${YELLOW}⚠️ [$timestamp] $message${NC}" | tee -a "$LOG_FILE" ;;
        "info") echo -e "${BLUE}ℹ️ [$timestamp] $message${NC}" | tee -a "$LOG_FILE" ;;
        *) echo -e "[$timestamp] $message" | tee -a "$LOG_FILE" ;;
    esac
}

# Funzione avanzata per gestire gli errori git
handle_git_error() {
    local operation="$1"
    local error_message="$2"
    local retry_count="${3:-3}"
    
    log "error" "Errore durante $operation: $error_message"
    
    if [ $retry_count -gt 0 ]; then
        log "warning" "Tentativo di ripetere l'operazione ($retry_count tentativi rimasti)"
        return 1
    else
        log "error" "Tentativi esauriti per $operation"
        exit 1
    fi
}

# Funzione per verificare l'integrità del repository
check_repository_integrity() {
    log "info" "Verifica integrità repository..."
    
    if ! git fsck --full --strict; then
        handle_git_error "verifica integrità" "Problemi riscontrati nel repository"
    fi
    
    if ! git diff --quiet; then
        log "warning" "Ci sono modifiche non committate nel repository"
    fi
}

# Funzione avanzata per la manutenzione git
git_maintenance() {
    log "info" "Eseguo manutenzione avanzata del repository git..."
    
    # Backup automatico prima della manutenzione
    local backup_branch="backup-$(date +%Y%m%d-%H%M%S)"
    git branch "$backup_branch" || handle_git_error "creazione backup" "Impossibile creare branch di backup"
    
    # Pulizia e ottimizzazione
    git gc --aggressive --prune=now || handle_git_error "garbage collection" "Errore durante la pulizia"
    git reflog expire --expire=now --all || handle_git_error "pulizia reflog" "Errore durante la pulizia reflog"
    
    # Rimozione branch remoti non più esistenti
    git remote prune origin || handle_git_error "pulizia remote" "Errore durante la pulizia dei remote"
    
    # Pulizia dei file non tracciati
    git clean -fd || handle_git_error "pulizia file" "Errore durante la pulizia dei file"
    
    # Verifica finale
    check_repository_integrity
    
    log "success" "Manutenzione completata con successo"
}

# Funzione avanzata per configurare le impostazioni git
git_config_setup() {
    log "info" "Configurazione avanzata git..."
    
    # Configurazioni base
    git config core.ignorecase false || handle_git_error "configurazione" "Errore impostazione ignorecase"
    git config core.fileMode false || handle_git_error "configurazione" "Errore impostazione fileMode"
    git config core.autocrlf false || handle_git_error "configurazione" "Errore impostazione autocrlf"
    git config core.eol lf || handle_git_error "configurazione" "Errore impostazione eol"
    git config core.symlinks false || handle_git_error "configurazione" "Errore impostazione symlinks"
    git config core.longpaths true || handle_git_error "configurazione" "Errore impostazione longpaths"
    
    # Configurazioni avanzate
    git config pull.rebase true || handle_git_error "configurazione" "Errore impostazione pull.rebase"
    git config fetch.prune true || handle_git_error "configurazione" "Errore impostazione fetch.prune"
    
    log "success" "Configurazione git completata con successo"
}
=======
LOG_FILE="subtree_sync.log"
BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
LOG_FILE="subtree_sync.log"

# Funzione per loggare messaggi
log() {
    local message="$1"
<<<<<<< HEAD
    #echo "📆 $(date '+%Y-%m-%d %H:%M:%S') - $message" | tee -a "$LOG_FILE"
    echo "📆 $(date '+%Y-%m-%d %H:%M:%S') - $message"
=======
<<<<<<< HEAD
    echo "📆 $(date '+%Y-%m-%d %H:%M:%S') - $message" | tee -a "$LOG_FILE"
=======
    #echo "📆 $(date '+%Y-%m-%d %H:%M:%S') - $message" | tee -a "$LOG_FILE"
    echo "📆 $(date '+%Y-%m-%d %H:%M:%S') - $message"
>>>>>>> origin/dev
>>>>>>> origin/dev
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


>>>>>>> origin/dev

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
<<<<<<< HEAD
}

=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
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


>>>>>>> origin/dev
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

<<<<<<< HEAD
=======
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

>>>>>>> origin/dev
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
}