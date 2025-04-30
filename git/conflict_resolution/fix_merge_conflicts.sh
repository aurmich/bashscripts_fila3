#!/bin/bash

# Includi le librerie necessarie
source ./bashscripts/lib/custom.sh
source ./bashscripts/lib/logging.sh

# Funzione per pulire un singolo file
clean_file() {
    local file="$1"
    log "Pulizia file: $file"
    
    # Backup del file originale
    cp "$file" "${file}.bak"
    
    # Rimuovi i marcatori di conflitto
    sed -i \
        -e '/^<<<<<<< HEAD$/d' \
        -e '/^=======$/d' \
        -e '/^>>>>>>> .*$/d' \
        -e '/^$/N;/^\n$/D' \
        "$file"
    
    # Verifica se il file è stato modificato
    if ! diff -q "$file" "${file}.bak" >/dev/null; then
        log "✅ File pulito: $file"
    else
        log "⚠️ Nessuna modifica necessaria: $file"
    fi
    
    # Rimuovi il backup
    rm "${file}.bak"
}

# Trova tutti i file con conflitti
log "Ricerca file con conflitti di merge..."
files_with_conflicts=$(find . -type f -not -path "*/\.*" \
    -not -path "*/vendor/*" \
    -not -path "*/node_modules/*" \
    -exec grep -l "<<<<<<< HEAD\|=======\|>>>>>>> " {} \;)

# Se non ci sono file con conflitti, esci
if [ -z "$files_with_conflicts" ]; then
    log "✅ Nessun file con conflitti trovato"
    exit 0
fi

# Pulisci ogni file
echo "$files_with_conflicts" | while read -r file; do
    clean_file "$file"
done

log "✅ Pulizia completata"
log "File processati: $(echo "$files_with_conflicts" | wc -l)" 