#!/bin/bash

# Directory base
BASE_DIR="/var/www/html/ptvx/laravel"
MODULES_DIR="$BASE_DIR/Modules"

# Array dei livelli PHPStan
LEVELS=(1 2 3 4 5 6 7 8 9 max)

# Funzione per analizzare un modulo
analyze_module() {
    local module=$1
    local module_dir="$MODULES_DIR/$module"
    
    # Crea la directory docs/phpstan se non esiste
    mkdir -p "$module_dir/docs/phpstan"
    
    # Analizza per ogni livello
    for level in "${LEVELS[@]}"; do
        echo "Analizzando modulo $module al livello $level..."
        cd "$BASE_DIR" && ./vendor/bin/phpstan analyse "Modules/$module" --level="$level" --error-format=json > "$module_dir/docs/phpstan/level_$level.json"
    done
}

# Trova tutti i moduli
for module in $(ls "$MODULES_DIR"); do
    if [ -d "$MODULES_DIR/$module" ]; then
        echo "Inizio analisi del modulo $module"
        analyze_module "$module"
        echo "Analisi completata per il modulo $module"
    fi
done

echo "Analisi completata per tutti i moduli" 