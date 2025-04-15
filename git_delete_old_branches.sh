#!/bin/sh

me=$(readlink -f -- "$0";)
git submodule foreach "$me"

# Branch da mantenere
branches_to_keep="dev master prod"

# Elimina i branch vecchi
for branch in $(git branch -r | grep -v HEAD | grep -v "$branches_to_keep"); do
    git branch -d "$branch"
done

echo "Branch vecchi eliminati con successo."
