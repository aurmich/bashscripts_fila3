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

# Esegui backup prima del push per garantire la sicurezza dei dati
# Perché: Il backup è cruciale prima di operazioni potenzialmente distruttive
# Cosa: Sincronizza i dati su disco e verifica il successo dell'operazione
if ! ./bashscripts/sync_to_disk.sh g ; then
    log "⚠️ Backup fallito - Interruzione per sicurezza"
    exit 1
fi
=======
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
>>>>>>> origin/dev

total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    # Applica riscrittura URL se ORG è passato
    if [ -n "$ORG" ]; then
<<<<<<< HEAD
        # Perché: La riscrittura dell'URL permette di supportare organizzazioni diverse
        # Cosa: Trasforma l'URL del repository per puntare all'organizzazione specificata
        url_org=$(rewrite_url "$url" "$ORG")
        
        # Preparazione dello script per il push verso l'organizzazione
        script="$script_dir/git_push_subtree_org.sh"
        chmod +x "$script"
        sed -i -e 's/\r$//' "$script"
        
        
        # Esecuzione del push con gestione degli errori
        if ! "$script" "$path" "$url_org" ; then
=======
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
>>>>>>> origin/dev
            log "⚠️ Push ORG fallita per $path."
        fi
    fi
    echo "---------"
    echo "🔄Submodule $i:"
    echo "  📁 Path: $path"
    echo "  🌐 URL: $url"
<<<<<<< HEAD
    # Preparazione dello script per il push standard
    # Perché: Lo script deve essere eseguibile e con terminazioni di riga corrette
    # Cosa: Imposta i permessi e normalizza le terminazioni di riga
    script="$script_dir/git_push_subtree.sh"
    chmod +x "$script"
    sed -i -e 's/\r$//' "$script"
=======
    script="$script_dir/git_push_subtree.sh"
    chmod +x "$script"
    sed -i -e 's/\r$//' "$script"
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
    # Chiamata esterna allo script di sincronizzazione
    if ! "$script" "$path" "$url" ; then
        log "⚠️ Push fallita per $path."
    fi
done
