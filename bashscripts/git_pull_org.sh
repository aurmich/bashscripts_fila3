#!/bin/sh

# Controllo parametri
if [ "$#" -ne 2 ]; then
    echo "Usage: $0 <organization> <branch>"
    exit 1
fi

org="$1"
branch="$2"
repo_name=$(basename "$(git rev-parse --show-toplevel)")
script_path=$(readlink -f -- "$0")
where=$(pwd)

echo "-------- START SYNC [$where ($branch) - ORG: $org] ----------"

# 1️⃣ Configurazioni globali per evitare problemi
git config --global core.fileMode false
git config --global core.autocrlf input

# 2️⃣ Fetch e Pull
git fetch origin
git pull origin "$branch"

echo "-------- END SYNC [$where ($branch) - ORG: $org] ----------"
