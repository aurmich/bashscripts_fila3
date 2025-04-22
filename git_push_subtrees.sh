#!/bin/bash


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
=======
<<<<<<< HEAD
# Esegui backup se richiesto
backup_disk
=======
if ! ./bashscripts/sync_to_disk.sh g ; then
    log "⚠️ backup fallito"
    exit 1
fi
>>>>>>> origin/dev
>>>>>>> origin/dev

total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    # Applica riscrittura URL se ORG è passato
    if [ -n "$ORG" ]; then
        url_org=$(rewrite_url "$url" "$ORG")
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
        script="$script_dir/git_push_subtree_org.sh" 
        chmod +x "$script"
        sed -i -e 's/\r$//' "$script"
        if ! "$script" "$path" "$url_org" ; then
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
        script="$script_dir/git_push_subtree_org.sh" 
=======
        script="$script_dir/git_push_subtree_org.sh"
>>>>>>> origin/dev
        chmod +x "$script"
        sed -i -e 's/\r$//' "$script"
        if ! "$script" "$path" "$url_org" "$BRANCH" ; then
>>>>>>> origin/dev
>>>>>>> origin/dev
            log "⚠️ Push ORG fallita per $path."
        fi
    fi
    echo "---------"
    echo "🔄Submodule $i:"
    echo "  📁 Path: $path"
    echo "  🌐 URL: $url"
    script="$script_dir/git_push_subtree.sh"
    chmod +x "$script"
    sed -i -e 's/\r$//' "$script"
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> origin/dev
>>>>>>> origin/dev
    # Chiamata esterna allo script di sincronizzazione
    if ! "$script" "$path" "$url" ; then
        log "⚠️ Push fallita per $path."
    fi
done
