#!/bin/bash


source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Chiama la funzione
parse_gitmodules gitmodules.ini

me=$( readlink -f -- "$0")
script_dir=$(dirname "$me")
ORG="$1"

if ! ./bashscripts/sync_to_disk.sh g ; then
    log "⚠️ backup fallito"
    exit 1
fi

git config core.ignorecase false
git config core.fileMode false

total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    # Applica riscrittura URL se ORG è passato
    if [ -n "$ORG" ]; then
        url_org=$(rewrite_url "$url" "$ORG")
        script="$script_dir/git_push_subtree_org.sh" 
        chmod +x "$script"
        sed -i -e 's/\r$//' "$script"
        if ! "$script" "$path" "$url_org"; then
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
