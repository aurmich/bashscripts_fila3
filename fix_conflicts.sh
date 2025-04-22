#!/bin/bash

source ./bashscripts/lib/custom.sh

log "info" "Inizio pulizia dei conflitti di merge..."

# Funzione per pulire un singolo file
clean_file() {
    local file=$1
    log "info" "Pulizia di $file"
    
    # Rimuove i marcatori di conflitto
    sed -i -e '/^<<<<<<< HEAD$/d' \
           -e '/^=======$/d' \
           -e '/^>>>>>>> .*$/d' "$file" || {
        log "error" "Errore nella pulizia di $file"
        return 1
    }
    
    # Rimuove le righe vuote multiple
    sed -i '/^$/N;/^\n$/D' "$file" || {
        log "error" "Errore nella pulizia righe vuote di $file"
        return 1
    }
    
    # Se è un file PHP, applica le correzioni specifiche
    if [[ "$file" == *.php ]]; then
        sed -i -e 's/namespace Modules\\Broker\\Filament\\Resources/namespace Modules\\Broker\\Filament\\Clusters\\AltriCluster\\Resources/' \
               -e 's/use Modules\\Broker\\Filament\\Resources\\/use Modules\\Broker\\Filament\\Clusters\\AltriCluster\\Resources\\/' \
               "$file" || {
            log "error" "Errore nella correzione namespace di $file"
            return 1
        }
    fi
    
    log "success" "File $file pulito"
    return 0
}

# Trova tutti i file con conflitti
find . -type f -not -path "*/\.*" \
       -not -path "*/vendor/*" \
       -not -path "*/node_modules/*" \
       -exec grep -l "<<<<<<< HEAD" {} \; | while read -r file; do
    clean_file "$file"
done

log "success" "Pulizia completata!"
