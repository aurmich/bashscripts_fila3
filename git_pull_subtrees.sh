#!/bin/bash

<<<<<<< HEAD
source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Chiama la funzione
parse_gitmodules gitmodules.ini
=======
>>>>>>> origin/dev

source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Chiama la funzione
parse_gitmodules gitmodules.ini

me=$( readlink -f -- "$0")
script_dir=$(dirname "$me")
ORG="$1"

<<<<<<< HEAD
# Esegui backup se richiesto
backup_disk

# Configurazione git
git_config_setup
=======
if ! ./bashscripts/sync_to_disk.sh d ; then
    log "⚠️ backup fallito"
    exit 1
fi

git config core.ignorecase false
git config core.fileMode false
>>>>>>> origin/dev

total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    # Applica riscrittura URL se ORG è passato
    if [ -n "$ORG" ]; then
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
        url_org=$(rewrite_url "$url" "$ORG")
        script="$script_dir/git_push_subtree_org.sh" 
        chmod +x "$script"
        sed -i -e 's/\r$//' "$script"
<<<<<<< HEAD
        if ! "$script" "$path" "$url_org" ; then
            log "⚠️ Push ORG fallita per $path."
        fi
=======
        if ! "$script" "$path" "$url_org" "$BRANCH" ; then
            log "⚠️ Push ORG fallita per $path."
        fi
=======
        url=$(rewrite_url "$url" "$ORG")
>>>>>>> origin/dev
>>>>>>> origin/dev
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
