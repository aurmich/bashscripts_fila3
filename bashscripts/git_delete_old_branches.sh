#!/bin/bash

# Script per eliminare i branch Git più vecchi di 30 giorni
# Questo script aiuta a mantenere pulito il repository rimuovendo i branch non più necessari

# Configurazione
DAYS_TO_KEEP=30
MAIN_BRANCHES="main master develop"
EXCLUDE_PATTERN="^(main|master|develop|HEAD)$"

# Funzione per ottenere la data dell'ultimo commit di un branch
get_last_commit_date() {
    local branch="$1"
    git show -s --format=%ct "$branch" 2>/dev/null
}

# Funzione per convertire timestamp in data leggibile
format_date() {
    local timestamp="$1"
    date -d "@$timestamp" "+%Y-%m-%d %H:%M:%S"
}

# Funzione per verificare se un branch è protetto
is_protected_branch() {
    local branch="$1"
    [[ "$MAIN_BRANCHES" =~ "$branch" ]] || [[ "$branch" =~ $EXCLUDE_PATTERN ]]
}

# Funzione per eliminare un branch
delete_branch() {
    local branch="$1"
    local last_commit_date="$2"
    local formatted_date="$3"
    
    echo "Eliminazione del branch: $branch (ultimo commit: $formatted_date)"
    git branch -D "$branch"
    git push origin --delete "$branch"
}

# Funzione principale
main() {
    # Verifica se siamo in un repository Git
    if ! git rev-parse --is-inside-work-tree >/dev/null 2>&1; then
        echo "Errore: Non sei in un repository Git"
        exit 1
    }

    # Ottieni la data di cutoff
    local cutoff_date=$(date -d "$DAYS_TO_KEEP days ago" +%s)
    
    echo "Eliminazione dei branch più vecchi di $DAYS_TO_KEEP giorni..."
    echo "Data di cutoff: $(format_date $cutoff_date)"
    echo "----------------------------------------"

    # Itera su tutti i branch remoti
    git branch -r | while read -r branch; do
        # Rimuovi il prefisso 'origin/'
        branch=${branch#origin/}
        
        # Salta i branch protetti
        if is_protected_branch "$branch"; then
            continue
        fi
        
        # Ottieni la data dell'ultimo commit
        last_commit_date=$(get_last_commit_date "$branch")
        
        if [ -n "$last_commit_date" ]; then
            formatted_date=$(format_date "$last_commit_date")
            
            # Se il branch è più vecchio del cutoff
            if [ "$last_commit_date" -lt "$cutoff_date" ]; then
                delete_branch "$branch" "$last_commit_date" "$formatted_date"
            fi
        fi
    done
}

# Esegui lo script
main
