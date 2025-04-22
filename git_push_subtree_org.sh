#!/bin/bash

source ./bashscripts/lib/custom.sh
# Validate input
if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
fi

LOCAL_PATH="$1"
REMOTE_REPO="$2"
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
BRANCH="main"  # Default branch
=======

>>>>>>> 3fd0e77 (Inizializzazione repository)
=======
>>>>>>> 38d1ecb (Inizializzazione repository)

curr_dir=$(pwd)

=======

curr_dir=$(pwd)
dummy_push "$BRANCH"
>>>>>>> 754d7c0 (Inizializzazione repository)
=======

curr_dir=$(pwd)
dummy_push "$BRANCH"
>>>>>>> 8bbe085 (Inizializzazione repository)
=======

curr_dir=$(pwd)
dummy_push "$BRANCH"
>>>>>>> 924f497 (Inizializzazione repository)
=======

curr_dir=$(pwd)
dummy_push "$BRANCH"
>>>>>>> feb158b (Inizializzazione repository)
log "info" "Inizializzazione push per $LOCAL_PATH verso $REMOTE_REPO (branch: $BRANCH)"

cd "$LOCAL_PATH" || handle_error "Impossibile accedere a $LOCAL_PATH"

# Inizializzazione repository locale
log "info" "Inizializzazione repository locale"
git init || handle_git_error "git init" "Impossibile inizializzare il repository"

# Creazione branch
log "info" "Creazione branch $BRANCH"
git checkout -b "$BRANCH" || handle_git_error "git checkout" "Impossibile creare il branch $BRANCH"
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
git_config_setup
>>>>>>> 3fd0e77 (Inizializzazione repository)
=======
git_config_setup
>>>>>>> 38d1ecb (Inizializzazione repository)
=======
git_config_setup
>>>>>>> 754d7c0 (Inizializzazione repository)
=======
git_config_setup
>>>>>>> 8bbe085 (Inizializzazione repository)
=======
git_config_setup
>>>>>>> 924f497 (Inizializzazione repository)
=======
git_config_setup
>>>>>>> feb158b (Inizializzazione repository)
# Configurazione remote
log "info" "Configurazione remote origin"
git remote add origin "$REMOTE_REPO" || handle_git_error "git remote add" "Impossibile aggiungere il remote origin"

# Fetch e merge
log "info" "Fetch da remote"
git fetch --all --depth=1 || handle_git_error "git fetch" "Impossibile eseguire fetch"

# Aggiunta e commit dei file
log "info" "Commit dei file locali"
git add -A
git commit -m "Inizializzazione repository" || true  # Non fallire se non ci sono cambiamenti

# Merge con remote
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 754d7c0 (Inizializzazione repository)
log "info" "Merge con remote"
<<<<<<< HEAD
#git merge origin/"$BRANCH" --allow-unrelated-histories || handle_git_error "git merge" "Impossibile eseguire merge con origin/$BRANCH"
git pull origin "$BRANCH" --autostash --rebase --allow-unrelated-histories --depth=1

<<<<<<< HEAD
# Commit finale e push
log "info" "Commit finale e push"
git add -A
git commit -m "Merge con remote" || true  # Non fallire se non ci sono cambiamenti
git push -u origin HEAD:"$BRANCH" || handle_git_error "git push" "Impossibile eseguire push su origin/$BRANCH"
git rebase --continue




=======
=======
>>>>>>> 38d1ecb (Inizializzazione repository)
log "info" "pull con remote"
#git merge origin/"$BRANCH" --allow-unrelated-histories || handle_git_error "git merge" "Impossibile eseguire merge con origin/$BRANCH"
=======
git merge origin/"$BRANCH" --allow-unrelated-histories || handle_git_error "git merge" "Impossibile eseguire merge con origin/$BRANCH"
>>>>>>> 9a303e2 (Inizializzazione repository)
git pull origin "$BRANCH" --autostash --rebase --allow-unrelated-histories --depth=1


while true; do
  # Fai l'add, commit e push
  git add -A
  git commit -am "."
  git push -u origin HEAD:"$BRANCH"
=======
=======
log "info" "Merge con remote"
git merge origin/"$BRANCH" --allow-unrelated-histories || handle_git_error "git merge" "Impossibile eseguire merge con origin/$BRANCH"
#git pull origin "$BRANCH" --autostash --rebase --allow-unrelated-histories --depth=1

>>>>>>> 8bbe085 (Inizializzazione repository)
=======
=======
>>>>>>> feb158b (Inizializzazione repository)
log "info" "Merge con remote"
git merge origin/"$BRANCH" --allow-unrelated-histories || handle_git_error "git merge" "Impossibile eseguire merge con origin/$BRANCH"
git pull origin "$BRANCH" --autostash --rebase --allow-unrelated-histories --depth=1

<<<<<<< HEAD
>>>>>>> 924f497 (Inizializzazione repository)
=======
>>>>>>> feb158b (Inizializzazione repository)

while true; do
  # Fai l'add, commit e push
  dummy_push "$BRANCH"
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 754d7c0 (Inizializzazione repository)
=======
>>>>>>> 8bbe085 (Inizializzazione repository)
=======
  git push -f 
>>>>>>> 924f497 (Inizializzazione repository)
=======
  git push -f origin HEAD:"$BRANCH"
>>>>>>> feb158b (Inizializzazione repository)
  git rebase --continue
   if [ $? -eq 0 ]; then
    # Se il rebase è completato senza errori (no conflitti)
    echo "Rebase completato con successo!"
    break
  else
    # Se ci sono conflitti, continua a tentare
    echo "Ci sono conflitti, continua il rebase..."
  fi
done
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 3fd0e77 (Inizializzazione repository)
=======
>>>>>>> 38d1ecb (Inizializzazione repository)
=======
>>>>>>> 754d7c0 (Inizializzazione repository)
=======
>>>>>>> 8bbe085 (Inizializzazione repository)
=======
>>>>>>> 924f497 (Inizializzazione repository)
=======
>>>>>>> feb158b (Inizializzazione repository)

# Pulizia
log "info" "Pulizia repository locale"
rm -rf .git

# Ritorno alla directory originale
cd "$curr_dir" || handle_error "Impossibile tornare alla directory originale"

log "success" "Push ORG completato con successo"