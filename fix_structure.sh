#!/bin/bash

# Array di cartelle da spostare in app/
MOVE_TO_APP=("Actions" "Broadcasting" "Casts" "Console" "Emails" "Enums" "Events" "Exceptions" "Jobs" "Listeners" "Mail" "Models" "Notifications" "Observers" "Policies" "Providers" "Rules" "Services" "Traits" "Filesystem" "Http" "Jobs" "Listeners" "Mail" "Models" "Notifications" "Observers" "Policies" "Providers" "Rules" "Services" "Traits" "Interfaces" "Repositories" "Transformers")

# Array di cartelle da rinominare in minuscolo
RENAME_TO_LOWER=("Config" "Database" "Resources" "Routes" "Tests")

# Crea la cartella app/ se non esiste
mkdir -p app

# Sposta le cartelle in app/ se esistono
for folder in "${MOVE_TO_APP[@]}"; do
    if [ -d "$folder" ]; then
        echo "Sposto $folder in app/$folder"
        mv "$folder" "app/$folder"
    fi
done

# Rinomina le cartelle in minuscolo se esistono
for folder in "${RENAME_TO_LOWER[@]}"; do
    if [ -d "$folder" ]; then
        echo "Rinomino $folder in ${folder,,}"
        mv "$folder" "${folder,,}"
    fi
done

echo "Struttura del progetto aggiornata con successo."
