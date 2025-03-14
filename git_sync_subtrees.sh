#!/bin/bash

# Script minimalista per sincronizzare git subtree con ottimizzazione della history
CONFIG_FILE="gitmodules.ini"
DEPTH=1  # Limita la profondità della history scaricata

# Verifica che il file di configurazione esista
if [[ ! -f $CONFIG_FILE ]]; then
    echo "❌ Errore: File $CONFIG_FILE non trovato!"
    exit 1
fi

# Ottieni il branch corrente
current_branch=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
echo "🌿 Branch corrente: $current_branch"

# Variabili per il parsing
current_path=""
current_url=""

# Processa le righe del file di configurazione
while IFS= read -r line; do
    # Salta righe vuote e commenti
    [[ -z "$line" || "$line" =~ ^[[:space:]]*# ]] && continue
    
    # Rimuovi spazi e CR
    line=$(echo "$line" | tr -d '\r' | sed 's/^[[:space:]]*//;s/[[:space:]]*$//')
    
    # Estrai i valori path e url
    if [[ "$line" =~ ^path\ *=\ *(.+)$ ]]; then
        current_path="${BASH_REMATCH[1]}"
    elif [[ "$line" =~ ^url\ *=\ *(.+)$ && -n "$current_path" ]]; then
        current_url="${BASH_REMATCH[1]}"
        
        echo "----------------------------------------"
        echo "📂 Path: $current_path"
        echo "🔗 URL: $current_url"
        echo "🌿 Branch: $current_branch"
        
        # Controlla se la directory esiste
        if [[ -d "$current_path" ]]; then
            echo "🔄 Aggiornamento subtree esistente..."
            
            # Fetch solo con history limitata prima di fare il pull
            echo "📥 Fetch con history ridotta (depth=$DEPTH)..."
            git fetch --depth=$DEPTH "$current_url" "$current_branch"
            
            # Pull dai cambiamenti remoti (con --squash per ridurre la history)
            git subtree pull --prefix="$current_path" "$current_url" "$current_branch" --squash -m "Sync subtree $current_path" || {
                echo "⚠️ Pull fallito, tentativo di recupero..."
                git rm -r --cached "$current_path" > /dev/null 2>&1 && \
                git subtree add --prefix="$current_path" "$current_url" "$current_branch" --squash -m "Re-add subtree $current_path"
            }
            
            # Push delle modifiche locali (solo il commit attuale)
            echo "⬆️ Push delle modifiche locali con history minimale..."
            split_branch="split-${current_path//\//-}"
            
            # Split con depth=1 per minimizzare la history
            git subtree split --prefix="$current_path" -b "$split_branch" && \
            git push "$current_url" "$split_branch:$current_branch" && \
            git branch -d "$split_branch"
        else
            echo "➕ Aggiunta nuovo subtree con history minima..."
            # Fetch con history ridotta
            git fetch --depth=$DEPTH "$current_url" "$current_branch"
            git subtree add --prefix="$current_path" "$current_url" "$current_branch" --squash -m "Add subtree $current_path"
        fi
        
        # Reset per il prossimo modulo
        current_path=""
    fi
done < "$CONFIG_FILE"

# Pulizia per ridurre la dimensione del repository locale
echo "🧹 Pulizia per ridurre la dimensione del repository..."
git gc --aggressive --prune=now

echo "✅ Sincronizzazione completata con history ottimizzata!"
