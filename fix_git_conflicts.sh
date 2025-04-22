#!/bin/bash

source ./bashscripts/lib/custom.sh

# 🎨 Colori per il logging
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

# 📝 Funzione di logging
log() {
    local level="$1"
    local message="$2"
    case "$level" in
        "error") echo -e "${RED}❌ $message${NC}" ;;
        "success") echo -e "${GREEN}✅ $message${NC}" ;;
        "warning") echo -e "${YELLOW}⚠️ $message${NC}" ;;
        "info") echo -e "${BLUE}ℹ️ $message${NC}" ;;
    esac
}

# 🔍 Funzione per verificare le dipendenze
check_dependencies() {
    local deps=("git" "php" "composer" "node" "npm")
    for dep in "${deps[@]}"; do
        if ! command -v "$dep" &> /dev/null; then
            log "error" "Dipendenza mancante: $dep"
            exit 1
        fi
    done
}

# 📦 Funzione per gestire le librerie comuni
handle_common_libraries() {
    local file="$1"
    local content=$(cat "$file")
    
    # Verifica se il file contiene riferimenti a librerie comuni
    if [[ "$content" == *"spatie/laravel-data"* ]] || 
       [[ "$content" == *"spatie/laravel-queueable-action"* ]] ||
       [[ "$content" == *"laraxot"* ]]; then
        log "info" "File contiene librerie comuni: $file"
        return 0
    fi
    return 1
}

# 🔧 Funzione per risolvere i conflitti in un file
fix_conflicts() {
    local file="$1"
    log "info" "Analisi file: $file"
    
    # 📦 Backup del file originale
    cp "$file" "${file}.bak" || { log "error" "Impossibile creare backup di $file"; return 1; }
    
    # 🔍 Verifica se il file contiene librerie comuni
    if handle_common_libraries "$file"; then
        log "warning" "File contiene librerie comuni, verifica manuale necessaria"
        return 1
    fi
    
    # 🧹 Rimozione marcatori di conflitto
    sed -i -e '/^<<<<<<< HEAD$/d' \
           -e '/^=======$/d' \
           -e '/^>>>>>>> /d' \
           "$file" || { log "error" "Errore nella pulizia di $file"; return 1; }
    
    # 🔍 Verifica modifiche
    if diff -q "$file" "${file}.bak" >/dev/null; then
        log "warning" "Nessuna modifica necessaria in: $file"
        rm "${file}.bak"
    else
        log "success" "Conflitti risolti in: $file"
        rm "${file}.bak"
        git add "$file" || { log "error" "Errore nell'add di $file"; return 1; }
    fi
}

# 🚀 Inizio script
log "info" "Inizio processo di risoluzione conflitti..."

# 🔍 Verifica dipendenze
check_dependencies

# 🔍 Ricerca file con conflitti
log "info" "Ricerca file con conflitti..."
files_with_conflicts=$(find . -type f \
    -not -path "*/\.*" \
    -not -path "*/vendor/*" \
    -not -path "*/node_modules/*" \
    -not -path "*/storage/*" \
    -not -path "*/public/*" \
    -exec grep -l "<<<<<<< HEAD" {} \;)

if [ -z "$files_with_conflicts" ]; then
    log "success" "Nessun conflitto trovato!"
    exit 0
fi

# 🚀 Risoluzione conflitti
log "info" "Inizio risoluzione conflitti..."
echo "$files_with_conflicts" | while read -r file; do
    if [ -f "$file" ]; then
        fix_conflicts "$file"
    fi
done

# 🧪 Esecuzione test
log "info" "Esecuzione test..."
cd laravel && ./vendor/bin/pest tests/Feature/GitConflictTest.php || {
    log "error" "Test falliti!"
    exit 1
}

# 🔍 Verifica PHPStan
log "info" "Verifica PHPStan..."
find . -type f -name "*.php" \
    -not -path "*/vendor/*" \
    -not -path "*/node_modules/*" \
    -not -path "*/storage/*" \
    -not -path "*/public/*" | while read -r file; do
    if [ -f "$file" ]; then
        ./vendor/bin/phpstan analyse "$file" || {
            log "error" "PHPStan fallito per $file"
            exit 1
        }
    fi
done

# ✅ Verifica finale
log "info" "Verifica finale..."
if find . -type f -exec grep -l "<<<<<<< HEAD" {} \; | grep -q .; then
    log "error" "Sono stati trovati conflitti non risolti!"
    exit 1
else
    log "success" "Tutti i conflitti sono stati risolti con successo!"
    exit 0
fi
