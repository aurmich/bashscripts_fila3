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
<<<<<<< Updated upstream
<<<<<<< HEAD
backup_disk

# Configurazione git
git_config_setup
=======
#backup_disk

# Configurazione git
# git_config_setup
>>>>>>> 53079ab (.)
=======
backup_disk

# Configurazione git
git_config_setup
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
    cd "$path"
    
    # Controllo se .git è un file e non una directory
    if [ -f ".git" ]; then
        echo "Trovato .git come file in $path, lo elimino..."
        rm -f .git
    fi
    
<<<<<<< Updated upstream
=======
    cd "$path" 
>>>>>>> 53079ab (.)
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< HEAD
    git stash || echo "🔄 Non ci sono modifiche da salvare"
    dummy_push "$ORG" "$BRANCH" "."

    git fetch "$ORG" "$BRANCH" --depth=1
    git pull "$ORG" "$BRANCH" --autostash  --depth=1
    git merge "$ORG/$BRANCH" --allow-unrelated-histories

    # Loop per gestire eventuali conflitti
    while ! git rebase --continue 2>/dev/null; do
        if git diff --name-only --diff-filter=U | grep .; then
            echo "⚠️  Conflitti trovati. Li sistemiamo in automatico (accettando i tuoi cambiamenti)..."
=======
     # 🧹 Pulizia file temporanei
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
    git add -A
    git commit -am "."
    #git pull "$ORG" "$BRANCH" --autostash --rebase --depth=1
=======
    git stash || echo "🔄 Non ci sono modifiche da salvare"
    dummy_push "$ORG" "$BRANCH" "."

>>>>>>> Stashed changes
    git fetch "$ORG" "$BRANCH" --depth=1
    git pull "$ORG" "$BRANCH" --autostash  --depth=1
    git merge "$ORG/$BRANCH" --allow-unrelated-histories

    # Loop per gestire eventuali conflitti
    while ! git rebase --continue 2>/dev/null; do
        if git diff --name-only --diff-filter=U | grep .; then
            echo "⚠️  Conflitti trovati. Li sistemiamo in automatico (accettando i tuoi cambiamenti)..."
<<<<<<< Updated upstream
            git add -A
            git commit -am "fix: auto resolve conflict"
            git push -u "$ORG" HEAD:"$BRANCH"
>>>>>>> 53079ab (.)
=======
>>>>>>> Stashed changes
        else
            echo "✅ Nessun conflitto o già risolto"
            break
        fi
<<<<<<< Updated upstream
<<<<<<< HEAD
        dummy_push "$ORG" "$BRANCH" "."
    done
    git stash apply || echo "🔄 Non ci sono modifiche da ripristinare"
    # Push finale
    dummy_push "$ORG" "$BRANCH" "."

    cd "$curr_dir"
done
<<<<<<< HEAD
=======
=======
done
>>>>>>> 3a208a9 (.)
=======
=======
        dummy_push "$ORG" "$BRANCH" "."
>>>>>>> Stashed changes
    done
    git stash apply || echo "🔄 Non ci sono modifiche da ripristinare"
    # Push finale
    dummy_push "$ORG" "$BRANCH" "."

    cd "$curr_dir"
done
>>>>>>> 53079ab (.)
>>>>>>> 7404b54 (.)
