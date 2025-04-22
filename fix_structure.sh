#!/bin/bash

# Definizione degli array di cartelle
MOVE_TO_APP=("Actions" "Broadcasting" "Casts" "Console" "Emails" "Enums" "Events" 
             "Exceptions" "Jobs" "Listeners" "Mail" "Models" "Notifications" 
             "Observers" "Policies" "Providers" "Rules" "Services" "Traits" 
             "Filesystem" "Http" "Interfaces" "Repositories" "Transformers")

RENAME_TO_LOWER=("App" "Config" "Database" "Resources" "Routes" "Tests")

# Funzione per gestire il movimento e la rinomina delle cartelle
move_and_rename() {
    local dir_name="$1"
    local dir_name_lower=$(echo "$dir_name" | tr '[:upper:]' '[:lower:]')
    local target_dir="${2:-}"  # Parametro opzionale per la directory di destinazione

    if [ -d "$dir_name" ] || [ -d "$dir_name_lower" ]; then
        # Gestione cartelle esistenti
        if [ -d "$dir_name" ] && [ -d "$dir_name_lower" ]; then
            echo "Unisco il contenuto di $dir_name in $dir_name_lower..."
            cp -r "$dir_name"/* "$dir_name_lower"/
            rm -rf "$dir_name"
        elif [ -d "$dir_name" ]; then
            echo "Rinomino $dir_name in $dir_name_lower..."
            mv "$dir_name" "$dir_name_lower"
        fi

        # Sposta nella directory di destinazione se specificata
        if [ -n "$target_dir" ]; then
            mkdir -p "$target_dir"
            echo "Sposto $dir_name_lower in $target_dir/"
            mv "$dir_name_lower" "$target_dir/"
        fi
    else
        echo "Nota: Le cartelle $dir_name o $dir_name_lower non esistono."
    fi
}

# Crea la cartella app se non esiste
mkdir -p app

# Processa le cartelle da spostare in app/
echo "Spostamento cartelle in app/..."
for folder in "${MOVE_TO_APP[@]}"; do
    move_and_rename "$folder" "app"
done

# Processa le cartelle da rinominare in minuscolo
echo "Rinomina cartelle in minuscolo..."
for folder in "${RENAME_TO_LOWER[@]}"; do
    move_and_rename "$folder"
done

echo "Struttura del progetto aggiornata con successo."
