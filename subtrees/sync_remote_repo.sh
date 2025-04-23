#!/bin/bash

source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Validate input
if [ $# -ne 1 ]; then
    echo "Usage: $0 <org>"
    exit 1
fi

# Chiama la funzione
parse_gitmodules gitmodules.ini

me=$( readlink -f -- "$0")
script_dir=$(dirname "$me")
ORG="$1"
curr_dir=$(pwd)

# Esegui backup se richiesto
#backup_disk

# Configurazione git
# git_config_setup

total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    url=$(rewrite_url "$url" "$ORG")
    # Verifica se l'URL è già presente come remote
    #if ! git remote -v | grep -q "$url"; then
    #    echo "Aggiungendo remote per $path..."
    #    git remote add "$ORG" "$url"
    #fi
    echo "Submodule $i: 📂 path: $path 🌐 URL: $url 🔑 ORG: $ORG"
    cd "$path" 
    git init
    git config --global --add safe.directory "$curr_dir/$path"
    git checkout "$BRANCH" -- 
    git remote add "$ORG" "$url"
    git_config_setup
    git add -A
    git commit -am "."
    #git pull "$ORG" "$BRANCH" --autostash --rebase --depth=1
    git fetch "$ORG" "$BRANCH" --depth=1
    git merge "$ORG/$BRANCH"
    
     # Loop per gestire eventuali conflitti
    while ! git rebase --continue 2>/dev/null; do
        if git diff --name-only --diff-filter=U | grep .; then
            echo "⚠️  Conflitti trovati. Li sistemiamo in automatico (accettando i tuoi cambiamenti)..."
            git add -A
            git commit -am "fix: auto resolve conflict"
            git push -u "$ORG" HEAD:"$BRANCH"
        else
            echo "✅ Nessun conflitto o già risolto"
            break
        fi
    done

    # Push finale
    git push -u "$ORG" HEAD:"$BRANCH"

    cd "$curr_dir"
done
