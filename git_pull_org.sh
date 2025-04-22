<<<<<<< HEAD
#!/bin/bash

if [ "$#" -ne 2 ]; then
=======
#!/bin/sh

# Controllo parametri
if [ -z "$1" ] || [ -z "$2" ]; then
>>>>>>> cb513be (.)
    echo "Usage: $0 <organization> <branch>"
    exit 1
fi

org="$1"
branch="$2"
repo_name=$(basename "$(git rev-parse --show-toplevel)")
script_path=$(readlink -f -- "$0")
where=$(pwd)

<<<<<<< HEAD
# 1️⃣ Configurazione Git
=======
echo "-------- START SYNC [$where ($branch) - ORG: $org] ----------"

# 1️⃣ Configurazioni globali per evitare problemi
>>>>>>> cb513be (.)
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
<<<<<<< HEAD
            log "error" "Risoluzione automatica fallita. Abort..."
            git rebase --abort
            log "info" "Tentativo merge..."
            git merge origin/$branch || handle_git_error "merge" "Merge fallito. Intervento manuale richiesto!"
=======
            echo "Rebase auto-fix failed. Aborting..."
            git rebase --abort
            echo "Attempting merge instead..."
            git merge origin/$branch || {
                echo "Merge also failed. Manual intervention required!"
                exit 1
            }
>>>>>>> cb513be (.)
        }
    fi
}

# 5️⃣ Normalizziamo i file e committiamo se ci sono modifiche
<<<<<<< HEAD
log "info" "Normalizzazione e commit modifiche..."
git add --renormalize -A || handle_git_error "add" "Errore nell'add"
git commit -am "sync update" || log "info" "Nessuna modifica da committare"

# 6️⃣ Push delle modifiche con retry
log "info" "Push modifiche..."
git push origin "$branch" --progress || {
    log "warning" "Push fallito, tentativo rebase e retry..."
    git pull --rebase origin "$branch" && git push origin "$branch" || handle_git_error "push" "Push fallito dopo retry"
}

=======
git add --renormalize -A
git commit -am "sync update" || echo '--------------------------- No changes to commit'

# 6️⃣ Push delle modifiche con retry
git push origin "$branch" --progress || {
    echo "Push failed, attempting rebase and retry..."
    git pull --rebase origin "$branch" && git push origin "$branch"
}

echo "-------- END PUSH [$where ($branch)] ----------"

>>>>>>> cb513be (.)
# 7️⃣ Configuriamo il tracking del branch, se necessario
if ! git rev-parse --abbrev-ref --symbolic-full-name "@{u}" >/dev/null 2>&1; then
    git branch --set-upstream-to=origin/$branch "$branch" || true
    git branch -u origin/$branch || true
fi

<<<<<<< HEAD
# 8️⃣ Configurazione globale
git config --global core.fileMode false
git config --global core.autocrlf input

=======
>>>>>>> cb513be (.)
echo "-------- END SYNC [$where ($branch) - ORG: $org] ----------"
