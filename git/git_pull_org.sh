<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> ff1452c (.)
#!/bin/bash

if [ "$#" -ne 2 ]; then
    echo "Usage: $0 <organization> <branch>"
    exit 1
fi

org="$1"
branch="$2"
repo_name=$(basename "$(git rev-parse --show-toplevel)")
script_path=$(readlink -f -- "$0")
where=$(pwd)

# 1️⃣ Configurazione Git
git config core.fileMode false
git config core.ignorecase false
git config advice.skippedCherryPicks false

# 2️⃣ Sincronizziamo i submoduli PRIMA di lavorare sul repository principale
git submodule sync --recursive
git submodule update --progress --init --recursive --force --merge --rebase --remote
git submodule foreach "$script_path" "$org" "$branch"

# 3️⃣ Sincronizziamo il repository principale
git fetch origin --progress --prune
if git show-ref --verify --quiet refs/heads/"$branch"; then
    git checkout "$branch"
else
    git checkout -t origin/"$branch" || git checkout -b "$branch"
fi

# 4️⃣ Pull con gestione dei conflitti
git pull --rebase origin "$branch" --autostash --recurse-submodules --allow-unrelated-histories --prune --progress -v || {
    echo "Rebase failed, attempting conflict resolution..."
    
    # 🔄 Tentiamo di continuare il rebase automaticamente
    if git rebase --continue; then
        echo "Rebase continued successfully."
    else
        echo "Rebase conflicts detected. Attempting automatic resolution..."

        # 🛠 Risolviamo automaticamente i conflitti prendendo la versione remota
        git diff --name-only --diff-filter=U | while read file; do
            git checkout --theirs "$file"
            git add "$file"
        done

        # 🛠 Proviamo a completare il rebase
        git rebase --continue || {
            log "error" "Risoluzione automatica fallita. Abort..."
            git rebase --abort
            log "info" "Tentativo merge..."
            git merge origin/$branch || handle_git_error "merge" "Merge fallito. Intervento manuale richiesto!"
        }
    fi
}

# 5️⃣ Normalizziamo i file e committiamo se ci sono modifiche
log "info" "Normalizzazione e commit modifiche..."
git add --renormalize -A || handle_git_error "add" "Errore nell'add"
git commit -am "sync update" || log "info" "Nessuna modifica da committare"

# 6️⃣ Push delle modifiche con retry
log "info" "Push modifiche..."
git push origin "$branch" --progress || {
    log "warning" "Push fallito, tentativo rebase e retry..."
    git pull --rebase origin "$branch" && git push origin "$branch" || handle_git_error "push" "Push fallito dopo retry"
}

# 7️⃣ Configuriamo il tracking del branch, se necessario
if ! git rev-parse --abbrev-ref --symbolic-full-name "@{u}" >/dev/null 2>&1; then
    git branch --set-upstream-to=origin/$branch "$branch" || true
    git branch -u origin/$branch || true
fi

# 8️⃣ Configurazione globale
git config --global core.fileMode false
git config --global core.autocrlf input

echo "-------- END SYNC [$where ($branch) - ORG: $org] ----------"
<<<<<<< HEAD
=======
#!/bin/bash

if [ "$#" -ne 2 ]; then
    echo "Usage: $0 <organization> <branch>"
    exit 1
fi

org="$1"
branch="$2"
repo_name=$(basename "$(git rev-parse --show-toplevel)")
script_path=$(readlink -f -- "$0")
where=$(pwd)

# 1️⃣ Configurazione Git
git config core.fileMode false
git config core.ignorecase false
git config advice.skippedCherryPicks false

# 2️⃣ Sincronizziamo i submoduli PRIMA di lavorare sul repository principale
git submodule sync --recursive
git submodule update --progress --init --recursive --force --merge --rebase --remote
git submodule foreach "$script_path" "$org" "$branch"

# 3️⃣ Sincronizziamo il repository principale
git fetch origin --progress --prune
if git show-ref --verify --quiet refs/heads/"$branch"; then
    git checkout "$branch"
else
    git checkout -t origin/"$branch" || git checkout -b "$branch"
fi

# 4️⃣ Pull con gestione dei conflitti
git pull --rebase origin "$branch" --autostash --recurse-submodules --allow-unrelated-histories --prune --progress -v || {
    echo "Rebase failed, attempting conflict resolution..."
    
    # 🔄 Tentiamo di continuare il rebase automaticamente
    if git rebase --continue; then
        echo "Rebase continued successfully."
    else
        echo "Rebase conflicts detected. Attempting automatic resolution..."

        # 🛠 Risolviamo automaticamente i conflitti prendendo la versione remota
        git diff --name-only --diff-filter=U | while read file; do
            git checkout --theirs "$file"
            git add "$file"
        done

        # 🛠 Proviamo a completare il rebase
        git rebase --continue || {
            log "error" "Risoluzione automatica fallita. Abort..."
            git rebase --abort
            log "info" "Tentativo merge..."
            git merge origin/$branch || handle_git_error "merge" "Merge fallito. Intervento manuale richiesto!"
        }
    fi
}

# 5️⃣ Normalizziamo i file e committiamo se ci sono modifiche
log "info" "Normalizzazione e commit modifiche..."
git add --renormalize -A || handle_git_error "add" "Errore nell'add"
git commit -am "sync update" || log "info" "Nessuna modifica da committare"

# 6️⃣ Push delle modifiche con retry
log "info" "Push modifiche..."
git push origin "$branch" --progress || {
    log "warning" "Push fallito, tentativo rebase e retry..."
    git pull --rebase origin "$branch" && git push origin "$branch" || handle_git_error "push" "Push fallito dopo retry"
}

# 7️⃣ Configuriamo il tracking del branch, se necessario
if ! git rev-parse --abbrev-ref --symbolic-full-name "@{u}" >/dev/null 2>&1; then
    git branch --set-upstream-to=origin/$branch "$branch" || true
    git branch -u origin/$branch || true
fi

# 8️⃣ Configurazione globale
git config --global core.fileMode false
git config --global core.autocrlf input

echo "-------- END SYNC [$where ($branch) - ORG: $org] ----------"
>>>>>>> c142b7c (.)
=======
>>>>>>> ff1452c (.)
