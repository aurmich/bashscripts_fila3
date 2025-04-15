#!/bin/bash

# Script per analizzare tutti i moduli con PHPStan e salvare i risultati

# Colori per output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Directory dove salvare i risultati
RESULTS_DIR="phpstan_results"
mkdir -p "$RESULTS_DIR"

# Data e ora per il timestamp
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")

echo -e "${BLUE}Inizio analisi PHPStan su tutti i moduli${NC}"
echo -e "${YELLOW}I risultati saranno salvati in $RESULTS_DIR/${NC}"

# Funzione per contare gli errori in un file
count_errors() {
    local file=$1
    local count=$(grep -c "ERROR" "$file")
    echo "$count"
}

# Array per memorizzare i moduli con errori
declare -A modules_with_errors

# Analizza ogni modulo
for module in Modules/*; do
    if [ -d "$module" ]; then
        module_name=$(basename "$module")
        
        echo -e "${YELLOW}Analisi di $module_name in corso...${NC}"
        
        # File per i risultati
        result_file="$RESULTS_DIR/${module_name}_$TIMESTAMP.txt"
        
        # Esecuzione PHPStan
        ./vendor/bin/phpstan analyse --level=9 --memory-limit=2G "$module" > "$result_file" 2>&1
        
        # Conta gli errori
        error_count=$(count_errors "$result_file")
        
        if [ "$error_count" -eq 0 ]; then
            echo -e "${GREEN}✓ $module_name: Nessun errore trovato${NC}"
        else
            echo -e "${RED}✗ $module_name: $error_count errori trovati${NC}"
            modules_with_errors["$module_name"]=$error_count
        fi
    fi
done

# Crea un report riassuntivo
summary_file="$RESULTS_DIR/summary_$TIMESTAMP.txt"
echo "Report PHPStan - $(date)" > "$summary_file"
echo "=================================" >> "$summary_file"
echo "" >> "$summary_file"

echo "Moduli senza errori:" >> "$summary_file"
for module in Modules/*; do
    if [ -d "$module" ]; then
        module_name=$(basename "$module")
        if [ -z "${modules_with_errors[$module_name]}" ]; then
            echo "- $module_name" >> "$summary_file"
        fi
    fi
done

echo "" >> "$summary_file"
echo "Moduli con errori:" >> "$summary_file"
for module_name in "${!modules_with_errors[@]}"; do
    echo "- $module_name: ${modules_with_errors[$module_name]} errori" >> "$summary_file"
done

echo -e "${BLUE}Analisi completata. Report salvato in $summary_file${NC}"
echo -e "${YELLOW}Moduli con errori:${NC}"
for module_name in "${!modules_with_errors[@]}"; do
    echo -e "${RED}- $module_name: ${modules_with_errors[$module_name]} errori${NC}"
done

# Suggerimenti per la correzione
echo -e "${BLUE}\nSuggerimenti per la correzione:${NC}"
echo -e "${YELLOW}1. Inizia dai moduli con meno errori per ottenere successi rapidi${NC}"
echo -e "${YELLOW}2. Per ogni modulo, correggi prima gli errori di namespace${NC}"
echo -e "${YELLOW}3. Seguire le linee guida in Modules/Xot/docs/PHPSTAN-IMPLEMENTATION-GUIDE.md${NC}"
echo -e "${YELLOW}4. Esegui nuovamente l'analisi dopo ogni serie di correzioni${NC}" 