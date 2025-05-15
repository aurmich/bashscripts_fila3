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
<<<<<<< HEAD
backup_disk

# Configurazione git
git_config_setup
=======
#backup_disk

# Configurazione git
# git_config_setup
>>>>>>> 975498ad (fix: auto resolve conflict)

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
<<<<<<< HEAD
    cd "$path"
    
    # Controllo se .git è un file e non una directory
    if [ -f ".git" ]; then
        echo "Trovato .git come file in $path, lo elimino..."
        rm -f .git
    fi
    
    # Verifica se .git esiste prima di inizializzare
    if [ ! -d ".git" ]; then
        echo "Inizializzazione repository Git in $path..."
        git init
    else
        echo "Repository Git già inizializzato in $path"
    fi

    git config --global --add safe.directory "$curr_dir/$path"
    git checkout "$BRANCH" -- || git checkout -b "$BRANCH"
    git remote add "$ORG" "$url"
    git_config_setup
    #git stash || echo "🔄 Non ci sono modifiche da salvare"
    dummy_push "$ORG" "$BRANCH" "."

    git fetch "$ORG" "$BRANCH" --depth=1
    git pull "$ORG" "$BRANCH" --autostash  --depth=1
    git merge "$ORG/$BRANCH" --allow-unrelated-histories

    # Loop per gestire eventuali conflitti
    while ! git rebase --continue 2>/dev/null; do
        if git diff --name-only --diff-filter=U | grep .; then
            echo "⚠️  Conflitti trovati. Li sistemiamo in automatico (accettando i tuoi cambiamenti)..."
=======
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
>>>>>>> 975498ad (fix: auto resolve conflict)
        else
            echo "✅ Nessun conflitto o già risolto"
            break
        fi
<<<<<<< HEAD
        dummy_push "$ORG" "$BRANCH" "."
    done
    #git stash apply || echo "🔄 Non ci sono modifiche da ripristinare"
    # Push finale
    dummy_push "$ORG" "$BRANCH" "."
=======
    done

    # Push finale
    git push -u "$ORG" HEAD:"$BRANCH"
>>>>>>> 975498ad (fix: auto resolve conflict)

    cd "$curr_dir"
done
