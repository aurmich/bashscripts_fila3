#!/bin/sh

<<<<<<< HEAD
<<<<<<< HEAD
me=$(readlink -f -- "$0";)
git submodule foreach "$me"
=======
me=$( readlink -f -- "$0";)
git submodule foreach "$me" 
>>>>>>> d516087e (.)
=======
me=$(readlink -f -- "$0";)
git submodule foreach "$me"
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)

# Branch da mantenere
branches_to_keep="dev master prod"

<<<<<<< HEAD
<<<<<<< HEAD
# Elimina i branch vecchi
for branch in $(git branch -r | grep -v HEAD | grep -v "$branches_to_keep"); do
    git branch -d "$branch"
done

echo "Branch vecchi eliminati con successo."
=======
# Itera su tutti i remote configurati
for remote in $(git remote); do
    echo "Checking remote: $remote"

    # Ottieni la lista di tutti i branch remoti, escludendo quelli da mantenere
    branches_to_delete=$(git branch -r | grep "remotes/$remote/" | sed "s#remotes/$remote/##" | grep -v -E "^(dev|master|prod)$")
    #branches_to_delete=$(git ls-remote --heads "$remote" | awk '{print $2}' | sed 's#refs/heads/##' | grep -v -E "^(dev|master|prod)$")

    # Cancella solo se ci sono branch da eliminare
    if [ -n "$branches_to_delete" ]; then
        for branch in $branches_to_delete; do
            echo "Deleting branch '$branch' from remote '$remote'..."
            git push "$remote" --delete "$branch"
        done
    else
        echo "No branches to delete for remote '$remote'."
    fi
done
>>>>>>> d516087e (.)
=======
# Elimina i branch vecchi
for branch in $(git branch -r | grep -v HEAD | grep -v "$branches_to_keep"); do
    git branch -d "$branch"
done

echo "Branch vecchi eliminati con successo."
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
