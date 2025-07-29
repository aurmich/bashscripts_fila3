<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> ff1452c (.)
#!/bin/bash

# Directory base
BASE_DIR="/var/www/html/ptvx"
LARAVEL_DIR="$BASE_DIR/laravel"
MODULES_DIR="$LARAVEL_DIR/Modules"

# Array dei livelli PHPStan
LEVELS=(1 2 3 4 5 6 7 8 9 max)

# Variabili per il report
TOTAL_MODULES=0
ANALYZED_MODULES=0
EMPTY_MODULES=0
ERROR_MODULES=0

# Funzione per analizzare un modulo
analyze_module() {
    local module=$1
    local module_dir="$MODULES_DIR/$module"
    local has_errors=0
    
    # Crea la directory docs/phpstan se non esiste
    mkdir -p "$module_dir/docs/phpstan"
    
    # Controlla se il modulo contiene file PHP
    if [ -z "$(find "$module_dir" -name "*.php" -type f)" ]; then
        echo "⚠️  Modulo $module non contiene file PHP da analizzare"
        ((EMPTY_MODULES++))
        return
    fi
    
    # Analizza per ogni livello
    for level in "${LEVELS[@]}"; do
        echo "📊 Analizzando modulo $module al livello $level..."
        output_file="$module_dir/docs/phpstan/level_$level.json"
        
        # Rimuovi il file se esiste già
        [ -f "$output_file" ] && rm "$output_file"
        
        # Esegui l'analisi e salva l'output
        cd "$LARAVEL_DIR" && ./vendor/bin/phpstan analyse "Modules/$module" --level="$level" --error-format=json > "$output_file" 2>&1
        
        # Verifica se il file è stato creato e non è vuoto
        if [ -f "$output_file" ] && [ -s "$output_file" ]; then
            echo "✅ File creato correttamente per il livello $level"
        else
            echo "❌ Errore durante l'analisi del modulo $module al livello $level"
            has_errors=1
        fi
    done
    
    if [ $has_errors -eq 0 ]; then
        echo "✅ Analisi completata con successo per il modulo $module"
        ((ANALYZED_MODULES++))
    else
        echo "❌ Analisi completata con errori per il modulo $module"
        ((ERROR_MODULES++))
    fi
}

# Report iniziale
echo "🚀 Inizio analisi PHPStan di tutti i moduli"
echo "----------------------------------------"

# Trova tutti i moduli
for module in $(ls "$MODULES_DIR"); do
    if [ -d "$MODULES_DIR/$module" ]; then
        ((TOTAL_MODULES++))
        analyze_module "$module"
    fi
done

# Report finale
echo "----------------------------------------"
echo "📈 Report Finale:"
echo "📦 Moduli totali: $TOTAL_MODULES"
echo "✅ Moduli analizzati con successo: $ANALYZED_MODULES"
echo "⚠️  Moduli vuoti: $EMPTY_MODULES"
echo "❌ Moduli con errori: $ERROR_MODULES"
<<<<<<< HEAD
=======
#!/bin/bash

# Directory base
BASE_DIR="/var/www/html/ptvx"
LARAVEL_DIR="$BASE_DIR/laravel"
MODULES_DIR="$LARAVEL_DIR/Modules"

# Array dei livelli PHPStan
LEVELS=(1 2 3 4 5 6 7 8 9 max)

# Variabili per il report
TOTAL_MODULES=0
ANALYZED_MODULES=0
EMPTY_MODULES=0
ERROR_MODULES=0

# Funzione per analizzare un modulo
analyze_module() {
    local module=$1
    local module_dir="$MODULES_DIR/$module"
    local has_errors=0
    
    # Crea la directory docs/phpstan se non esiste
    mkdir -p "$module_dir/docs/phpstan"
    
    # Controlla se il modulo contiene file PHP
    if [ -z "$(find "$module_dir" -name "*.php" -type f)" ]; then
        echo "⚠️  Modulo $module non contiene file PHP da analizzare"
        ((EMPTY_MODULES++))
        return
    fi
    
    # Analizza per ogni livello
    for level in "${LEVELS[@]}"; do
        echo "📊 Analizzando modulo $module al livello $level..."
        output_file="$module_dir/docs/phpstan/level_$level.json"
        
        # Rimuovi il file se esiste già
        [ -f "$output_file" ] && rm "$output_file"
        
        # Esegui l'analisi e salva l'output
        cd "$LARAVEL_DIR" && ./vendor/bin/phpstan analyse "Modules/$module" --level="$level" --error-format=json > "$output_file" 2>&1
        
        # Verifica se il file è stato creato e non è vuoto
        if [ -f "$output_file" ] && [ -s "$output_file" ]; then
            echo "✅ File creato correttamente per il livello $level"
        else
            echo "❌ Errore durante l'analisi del modulo $module al livello $level"
            has_errors=1
        fi
    done
    
    if [ $has_errors -eq 0 ]; then
        echo "✅ Analisi completata con successo per il modulo $module"
        ((ANALYZED_MODULES++))
    else
        echo "❌ Analisi completata con errori per il modulo $module"
        ((ERROR_MODULES++))
    fi
}

# Report iniziale
echo "🚀 Inizio analisi PHPStan di tutti i moduli"
echo "----------------------------------------"

# Trova tutti i moduli
for module in $(ls "$MODULES_DIR"); do
    if [ -d "$MODULES_DIR/$module" ]; then
        ((TOTAL_MODULES++))
        analyze_module "$module"
    fi
done

# Report finale
echo "----------------------------------------"
echo "📈 Report Finale:"
echo "📦 Moduli totali: $TOTAL_MODULES"
echo "✅ Moduli analizzati con successo: $ANALYZED_MODULES"
echo "⚠️  Moduli vuoti: $EMPTY_MODULES"
echo "❌ Moduli con errori: $ERROR_MODULES"
>>>>>>> c142b7c (.)
=======
>>>>>>> ff1452c (.)
echo "----------------------------------------" 