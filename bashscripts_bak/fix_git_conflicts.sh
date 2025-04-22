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
    case "$level" in
        "error") echo -e "${RED}❌ $message${NC}" ;;
        "success") echo -e "${GREEN}✅ $message${NC}" ;;
        "warning") echo -e "${YELLOW}⚠️ $message${NC}" ;;
        "info") echo -e "ℹ️ $message" ;;
    esac
}

# 🔧 Funzione per risolvere i conflitti in un file
fix_conflicts() {
    local file="$1"
    log "info" "Analisi file: $file"
    
    # 📦 Backup del file originale
    cp "$file" "${file}.bak" || { log "error" "Impossibile creare backup di $file"; return 1; }
    
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
=======
# Funzione per risolvere i conflitti in un file
fix_conflicts() {
    local file="$1"
    echo "🔧 Risoluzione conflitti in: $file"
    
    # Backup del file originale
    cp "$file" "${file}.bak"
    
    # Rimuove i marcatori di conflitto e mantiene la versione più recente
    sed -i -e '/^<<<<<<< HEAD$/d' \
           -e '/^=======$/d' \
           -e '/^>>>>>>> /d' \
           "$file"
    
    # Verifica se il file è stato modificato
    if diff -q "$file" "${file}.bak" >/dev/null; then
        echo "⚠️ Nessuna modifica necessaria in: $file"
        rm "${file}.bak"
    else
        echo "✅ Conflitti risolti in: $file"
        rm "${file}.bak"
        git add "$file"
    fi
}

# Trova tutti i file con conflitti
echo "🔍 Ricerca file con conflitti..."
files_with_conflicts=$(find . -type f -not -path "*/\.*" -not -path "*/vendor/*" -not -path "*/node_modules/*" -exec grep -l "<<<<<<< HEAD" {} \;)

if [ -z "$files_with_conflicts" ]; then
    echo "✨ Nessun conflitto trovato!"
    exit 0
fi

# Risolvi i conflitti in ogni file
echo "🚀 Inizio risoluzione conflitti..."
>>>>>>> origin/dev
echo "$files_with_conflicts" | while read -r file; do
    if [ -f "$file" ]; then
        fix_conflicts "$file"
    fi
done

<<<<<<< HEAD
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

log "success" "Processo completato con successo!" 
=======
# Esegui i test
echo "🧪 Esecuzione test..."
cd laravel && ./vendor/bin/pest tests/Feature/GitConflictTest.php

# Verifica PHPStan per i file PHP
echo "🔍 Verifica PHPStan..."
find . -type f -name "*.php" -not -path "*/vendor/*" -not -path "*/node_modules/*" | while read -r file; do
    if [ -f "$file" ]; then
        ./vendor/bin/phpstan analyse "$file"
    fi
done

echo "✅ Processo completato!" 
>>>>>>> origin/dev
