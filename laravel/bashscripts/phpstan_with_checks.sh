#!/bin/bash

# Script che combina la verifica della struttura delle directory e l'analisi PHPStan

# Colori per output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Verifica se è stato fornito un modulo come argomento
if [ -z "$1" ]; then
    echo -e "${RED}Errore: È necessario specificare un modulo${NC}"
    echo -e "${YELLOW}Uso: $0 NomeModulo [--fix]${NC}"
    echo -e "${YELLOW}Aggiungi --fix per correggere automaticamente la struttura delle directory${NC}"
    exit 1
fi

MODULE=$1
MODULE_PATH="Modules/$MODULE"
AUTO_FIX=false

# Controlla se è stata richiesta la correzione automatica
if [ "$2" == "--fix" ]; then
    AUTO_FIX=true
fi

# Verifica se il modulo esiste
if [ ! -d "$MODULE_PATH" ]; then
    echo -e "${RED}Errore: Il modulo $MODULE non esiste${NC}"
    exit 1
fi

echo -e "${BLUE}========================================${NC}"
echo -e "${BLUE}FASE 1: Verifica della struttura delle directory${NC}"
echo -e "${BLUE}========================================${NC}"

# Trova tutti i file PHP che non sono nelle directory consentite
files=$(find "$MODULE_PATH" -type f -name "*.php" | grep -v "/app/" | grep -v "/config/" | grep -v "/database/" | grep -v "/routes/" | grep -v "/resources/" | grep -v "/docs/")

if [ -z "$files" ]; then
    echo -e "${GREEN}✓ La struttura delle directory del modulo $MODULE è corretta${NC}"
else
    echo -e "${RED}✗ Trovati file PHP in posizioni non corrette:${NC}"
    
    # Mostra i file in posizioni errate
    echo "$files" | while read file; do
        echo -e "${RED}✗ $file${NC}"
        
        # Suggerisci dove dovrebbe essere posizionato
        rel_path=$(echo "$file" | sed "s|$MODULE_PATH/||")
        new_path="$MODULE_PATH/app/$rel_path"
        echo -e "${YELLOW}  Dovrebbe essere in: $new_path${NC}"
    done
    
    if [ "$AUTO_FIX" = true ]; then
        echo -e "${YELLOW}Correzione automatica in corso...${NC}"
        
        # Correggi la struttura
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
        done
        
        echo -e "${GREEN}✓ Correzione automatica completata${NC}"
    else
        echo ""
        echo -e "${YELLOW}Prima di eseguire PHPStan, è necessario correggere la struttura delle directory.${NC}"
        echo -e "${YELLOW}Esegui nuovamente con l'opzione --fix per correggere automaticamente:${NC}"
        echo -e "${GREEN}$0 $MODULE --fix${NC}"
        exit 1
    fi
fi

echo -e "${BLUE}========================================${NC}"
echo -e "${BLUE}FASE 2: Verifica dei namespace${NC}"
echo -e "${BLUE}========================================${NC}"

# Cerca namespace errati che includono App
namespace_errors=$(grep -r "namespace Modules\\\\$MODULE\\\\App\\\\" "$MODULE_PATH/app" --include="*.php" 2>/dev/null)

if [ -z "$namespace_errors" ]; then
    echo -e "${GREEN}✓ I namespace nel modulo $MODULE sono corretti${NC}"
else
    echo -e "${RED}✗ Trovati namespace errati che includono 'App':${NC}"
    
    echo "$namespace_errors" | while read -r line; do
        file=$(echo "$line" | cut -d':' -f1)
        echo -e "${RED}✗ $file${NC}"
        
        if [ "$AUTO_FIX" = true ]; then
            # Correggi il namespace
            sed -i "s/namespace Modules\\\\$MODULE\\\\App\\\\/namespace Modules\\\\$MODULE\\\\/g" "$file"
            echo -e "${GREEN}✓ Corretto namespace in $file${NC}"
        fi
    done
    
    if [ "$AUTO_FIX" = true ]; then
        echo -e "${GREEN}✓ Namespace corretti automaticamente${NC}"
    else
        echo ""
        echo -e "${YELLOW}Prima di eseguire PHPStan, è necessario correggere i namespace.${NC}"
        echo -e "${YELLOW}Esegui nuovamente con l'opzione --fix per correggere automaticamente:${NC}"
        echo -e "${GREEN}$0 $MODULE --fix${NC}"
        exit 1
    fi
fi

echo -e "${BLUE}========================================${NC}"
echo -e "${BLUE}FASE 3: Esecuzione di PHPStan${NC}"
echo -e "${BLUE}========================================${NC}"

# Esegui PHPStan
echo -e "${YELLOW}Esecuzione di PHPStan sul modulo $MODULE...${NC}"
./vendor/bin/phpstan analyse --level=9 --memory-limit=2G "$MODULE_PATH"

# Salva il codice di uscita di PHPStan
PHPSTAN_EXIT_CODE=$?

if [ $PHPSTAN_EXIT_CODE -eq 0 ]; then
    echo -e "${GREEN}✓ PHPStan completato senza errori!${NC}"
else
    echo -e "${RED}✗ PHPStan ha rilevato errori. Consulta la documentazione:${NC}"
    echo -e "${YELLOW}  - Modules/Xot/docs/PHPSTAN-FIXES-SUMMARY.md${NC}"
    echo -e "${YELLOW}  - Modules/Xot/docs/PHPSTAN-GENERIC-TYPES.md${NC}"
    echo -e "${YELLOW}  - Modules/Xot/docs/PHPSTAN-IMPLEMENTATION-GUIDE.md${NC}"
fi

exit $PHPSTAN_EXIT_CODE 