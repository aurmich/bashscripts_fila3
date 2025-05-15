#!/bin/bash

source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Chiama la funzione
parse_gitmodules gitmodules.ini

me=$( readlink -f -- "$0")
script_dir=$(dirname "$me")
CUSTOM_ORG="$1"

# Script per sincronizzare git subtree con ottimizzazione della history
CONFIG_FILE="gitmodules.ini"
DEPTH=1  # Limita la profondità della history scaricata

# Verifica che il file di configurazione esista
if [[ ! -f $CONFIG_FILE ]]; then
    handle_git_error "verifica configurazione" "File $CONFIG_FILE non trovato!"
fi

log "info" "🌿 Branch corrente: $BRANCH"

# Processa le righe del file di configurazione
while IFS= read -r line; do
    # Salta righe vuote e commenti
    [[ -z "$line" || "$line" =~ ^[[:space:]]*# ]] && continue
    
    # Rimuovi spazi e CR
    line=$(echo "$line" | tr -d '\r' | sed 's/^[[:space:]]*//;s/[[:space:]]*$//')
    
    # Estrai i valori path e url
    if [[ "$line" =~ ^path\ *=\ *(.+)$ ]]; then
        current_path="${BASH_REMATCH[1]}"
    elif [[ "$line" =~ ^url\ *=\ *(.+)$ && -n "$current_path" ]]; then
        current_url="${BASH_REMATCH[1]}"

        # Modifica l'organizzazione nell'URL se CUSTOM_ORG è fornito
        if [[ -n "$CUSTOM_ORG" && "$current_url" =~ git@github.com:([^/]+)/(.+)$ ]]; then
            # Estrae la parte originale dell'organizzazione e il repository
            original_org="${BASH_REMATCH[1]}"
            repo_name="${BASH_REMATCH[2]}"
            
            # Sostituisce l'organizzazione con quella personalizzata
            current_url="git@github.com:${CUSTOM_ORG}/${repo_name}"
            log "info" "🔄 URL modificato: $current_url (org originale: $original_org → $CUSTOM_ORG)"
        fi
        
        # Chiamata esterna allo script di sincronizzazione
        log "info" "🔄 Sincronizzazione modulo: $current_path [$current_url]"
        if ! "$script_dir/git_sync_subtree.sh" "$current_path" "$current_url" ; then
            log "error" "Sincronizzazione fallita per $current_path"
        fi
        
        # Pulizia: reset delle variabili per il prossimo modulo
        current_path=""
        current_url=""
    fi
done < "$CONFIG_FILE"

# Esegui manutenzione git per mantenere il repository leggero
git_maintenance

# Normalizza le terminazioni di riga dello script
sed -i -e 's/\r$//' "$me"

log "success" "Sincronizzazione completata con history ottimizzata!"
