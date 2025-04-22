<<<<<<< HEAD
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
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
#!/bin/sh

# Funzione per copiare e rinominare le cartelle
move_config() {
  local dir_name="$1"  # Il nome della cartella (es. "Config")
  local dir_name_lower=$(echo "$dir_name" | tr '[:upper:]' '[:lower:]')  # Trasforma il nome in minuscolo

  # Verifica che la cartella esista
  if [ -d "$dir_name" ] && [ -d "$dir_name_lower" ]; then
    # Copia tutto il contenuto di dir_name_lower nella cartella passata come parametro
    cp -r "$dir_name_lower"/* "$dir_name"/
    
    # Rinomina dir_name_lower in dir_name e la cartella passata in dir_name_lower
    mv "$dir_name_lower" "$dir_name_lower"_old
    mv "$dir_name" "$dir_name_lower"
    echo "Operazione completata per $dir_name."
  else
    echo "Errore: Le cartelle $dir_name o $dir_name_lower non esistono."
  fi

  # Aggiungi il controllo per rinominare la cartella _old in caso di conflitto
  if [ -d "$dir_name_lower"_old ] && [ ! -d "$dir_name_lower" ]; then
    echo "Rinominando $dir_name_lower_old in $dir_name_lower..."
    mv "$dir_name_lower"_old "$dir_name_lower"
  fi
}




move_config "App"
move_config "Config"
move_config "Database"
move_config "Resources"
move_config "Routes"
move_config "Tests"
<<<<<<< HEAD
=======
=======
>>>>>>> origin/dev
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
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
