#!/bin/bash

# Script per correggere automaticamente la struttura delle directory nei moduli Laraxot PTVX

# Colori per output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Verifica se è stato fornito un modulo come argomento
if [ -z "$1" ]; then
    echo -e "${RED}Errore: È necessario specificare un modulo${NC}"
    echo -e "${YELLOW}Uso: $0 NomeModulo${NC}"
    echo -e "${YELLOW}Per correggere tutti i moduli: $0 --all${NC}"
    exit 1
fi

# Funzione per correggere la struttura di un modulo
fix_module_structure() {
    local MODULE=$1
    local MODULE_PATH="Modules/$MODULE"
    
    # Verifica se il modulo esiste
    if [ ! -d "$MODULE_PATH" ]; then
        echo -e "${RED}Errore: Il modulo $MODULE non esiste${NC}"
        return 1
    fi
    
    echo -e "${BLUE}Correzione della struttura delle directory per il modulo $MODULE...${NC}"
    
    # Trova tutti i file PHP che non sono nelle directory consentite
    local files=$(find "$MODULE_PATH" -type f -name "*.php" | grep -v "/app/" | grep -v "/config/" | grep -v "/database/" | grep -v "/routes/" | grep -v "/resources/" | grep -v "/docs/")
    
    if [ -z "$files" ]; then
        echo -e "${GREEN}✓ La struttura delle directory del modulo $MODULE è già corretta${NC}"
        return 0
    fi
    
    local count=0
    
    # Sposta i file nella directory app appropriata
    echo "$files" | while read file; do
        # Estrai il percorso relativo dopo Modules/NomeModulo/
        rel_path=$(echo "$file" | sed "s|$MODULE_PATH/||")
        
        # Ignora config, database, routes, resources e docs
        if [[ "$rel_path" == config/* ]] || [[ "$rel_path" == database/* ]] || [[ "$rel_path" == routes/* ]] || [[ "$rel_path" == resources/* ]] || [[ "$rel_path" == docs/* ]]; then
            continue
        fi
        
        # Crea il nuovo percorso
        new_path="$MODULE_PATH/app/$rel_path"
        
        # Crea la directory se non esiste
        mkdir -p "$(dirname "$new_path")"
        
        # Sposta il file
        mv "$file" "$new_path"
        echo -e "${GREEN}✓ Spostato: $file -> $new_path${NC}"
        
        # Incrementa il contatore
        ((count++))
    done
    
    echo -e "${BLUE}Struttura corretta per il modulo $MODULE. $count file spostati.${NC}"
    return 0
}

# Correggi tutti i moduli o solo quello specificato
if [ "$1" == "--all" ]; then
    echo -e "${BLUE}Correzione della struttura delle directory per tutti i moduli...${NC}"
    
    # Trova tutti i moduli
    for module_path in Modules/*; do
        if [ -d "$module_path" ]; then
            module_name=$(basename "$module_path")
            fix_module_structure "$module_name"
        fi
    done
    
    echo -e "${BLUE}Correzione della struttura delle directory completata per tutti i moduli${NC}"
else
    # Correggi solo il modulo specificato
    fix_module_structure "$1"
fi

# Correzione specifica per Rating/Enums/SupportedLocale.php
if [ -f "Modules/Rating/Enums/SupportedLocale.php" ]; then
    echo -e "${YELLOW}Correzione specifica per Rating/Enums/SupportedLocale.php...${NC}"
    
    # Crea la directory se non esiste
    mkdir -p "Modules/Rating/app/Enums"
    
    # Sposta il file
    mv "Modules/Rating/Enums/SupportedLocale.php" "Modules/Rating/app/Enums/SupportedLocale.php"
    echo -e "${GREEN}✓ Spostato: Modules/Rating/Enums/SupportedLocale.php -> Modules/Rating/app/Enums/SupportedLocale.php${NC}"
    
    # Rimuovi la directory vuota
    rmdir "Modules/Rating/Enums" 2>/dev/null
fi

echo -e "${BLUE}Verifica finale...${NC}"
# Esegui un controllo finale per verificare che tutti i file siano stati spostati correttamente
find Modules -type f -name "*.php" | grep -v "/app/" | grep -v "/config/" | grep -v "/database/" | grep -v "/routes/" | grep -v "/resources/" | grep -v "/docs/" | grep -v "/vendor/" > /tmp/remaining_files.txt

if [ -s /tmp/remaining_files.txt ]; then
    echo -e "${YELLOW}Attenzione: Ci sono ancora file PHP posizionati in modo errato:${NC}"
    cat /tmp/remaining_files.txt | while read file; do
        echo -e "${RED}✗ $file${NC}"
    done
    echo -e "${YELLOW}Esegui nuovamente lo script per correggere questi file.${NC}"
else
    echo -e "${GREEN}✓ Tutti i file PHP sono posizionati correttamente!${NC}"
fi

echo -e "${GREEN}Script completato.${NC}" 