#!/bin/bash

# Colori per output
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m'

echo -e "${GREEN}Inizio risoluzione conflitti nei file .md...${NC}"

# Trova tutti i file .md con conflitti
find . -type f -name "*.md" -exec grep -l "<<<<<<< HEAD" {} \; | while read -r file; do
    echo -e "${GREEN}Elaborazione file: $file${NC}"
    
    # Crea un file temporaneo
    temp_file=$(mktemp)
    
    # Leggi il file riga per riga
    while IFS= read -r line; do
        if [[ $line == *"<<<<<<< HEAD"* ]]; then
            # Inizia una nuova sezione
            echo -e "\n### Versione HEAD\n" >> "$temp_file"
        elif [[ $line == *"======="* ]]; then
            # Inizia la versione alternativa
            echo -e "\n### Versione Alternativa\n" >> "$temp_file"
        elif [[ $line == *">>>>>>>"* ]]; then
            # Fine del conflitto
            echo -e "\n---\n" >> "$temp_file"
        else
            # Scrivi la riga normale
            echo "$line" >> "$temp_file"
        fi
    done < "$file"
    
    # Sostituisci il file originale con quello temporaneo
    mv "$temp_file" "$file"
    
    echo -e "${GREEN}Conflitto risolto in: $file${NC}"
done

echo -e "${GREEN}Risoluzione conflitti completata!${NC}" 