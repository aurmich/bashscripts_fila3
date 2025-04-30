#!/bin/bash

<<<<<<< HEAD
source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Chiama la funzione
parse_gitmodules gitmodules.ini
=======
# Correzione dei marker di conflitto git e integrazione della versione più coerente e funzionante.
# Per maggiori informazioni, consultare la cartella docs.
>>>>>>> d2064db (.)

source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Chiama la funzione
parse_gitmodules gitmodules.ini

me=$( readlink -f -- "$0")
script_dir=$(dirname "$me")
ORG="$1"

# Esegui backup se richiesto
backup_disk

# Configurazione git
git_config_setup

total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    # Applica riscrittura URL se ORG è passato
    if [ -n "$ORG" ]; then
        url_org=$(rewrite_url "$url" "$ORG")
<<<<<<< HEAD
        script="$script_dir/git_push_subtree_org.sh" 
        chmod +x "$script"
        sed -i -e 's/\r$//' "$script"
        if ! "$script" "$path" "$url_org" "$BRANCH" ; then
=======
        script="$script_dir/git_pull_subtree_org.sh" 
        chmod +x "$script"
        sed -i -e 's/\r$//' "$script"
        if ! "$script" "$path" "$url_org" ; then
>>>>>>> d2064db (.)
            log "⚠️ Push ORG fallita per $path."
        fi
    fi
    echo "---------"
    echo "Submodule $i  📁 Path: $path  🌐 URL: $url"
    script="$script_dir/git_pull_subtree.sh"
    chmod +x "$script"
    sed -i -e 's/\r$//' "$script"

    # Chiamata esterna allo script di sincronizzazione
    log "🔄 Pull modulo: $path"
    if ! "$script" "$path" "$url" ; then
        log "⚠️ Pull fallita per $path."
    fi
done
