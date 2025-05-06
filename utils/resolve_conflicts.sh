#!/bin/bash
<<<<<<< HEAD
set -euo pipefail

# Includi le librerie necessarie
source ./bashscripts/lib/custom.sh
source ./bashscripts/lib/logging.sh

# Configurazione
MODEL="codellama:7b"
USE_AI=${USE_AI:-false}

# Verifica prerequisiti per AI
check_ai_requirements() {
    if [ "$USE_AI" = true ]; then
        # Verifica Ollama
        if ! curl -s http://localhost:11434/api/tags >/dev/null 2>&1; then
            log "error" "Ollama non è in esecuzione. Avvia Ollama o usa --no-ai"
            exit 1
        fi

        # Verifica modello
        if ! curl -s http://localhost:11434/api/tags | jq -e '.models[] | select(.name=="'$MODEL'")' >/dev/null 2>&1; then
            log "error" "Modello $MODEL non trovato. Esegui: ollama pull $MODEL"
            exit 1
        fi
    fi
}

# Funzione per pulire un file con AI
clean_file_ai() {
    local file="$1"
    local temp_file
    temp_file=$(mktemp)
    local prompt_file
    prompt_file=$(mktemp)

    # Assicura la rimozione dei file temporanei
    trap 'rm -f "${temp_file:-}" "${prompt_file:-}"' EXIT

    # Backup
    cp "$file" "${file}.backup"

    # Costruisci prompt
    cat > "$prompt_file" <<EOF
You are an expert developer tasked with fixing and optimizing the following code. Your objective is to:

1. Fix any syntax errors, unresolved merge conflicts, or logical issues
2. Remove git conflict markers (<<<<<<<, =======, >>>>>>>) if present
3. Optimize the code structure and readability without changing functionality
4. Ensure consistency in formatting and naming conventions
5. Apply best practices and modern syntax where appropriate

Return ONLY the corrected and optimized code, without any explanations or markdown formatting.

Here is the code:
EOF

    cat "$file" >> "$prompt_file"

    log "info" "Elaborazione AI di $file con $MODEL..."

    # Richiedi correzione ad Ollama
    local json_payload
    json_payload=$(jq -n --arg model "$MODEL" --arg prompt "$(cat "$prompt_file")" '{model: $model, prompt: $prompt, stream: false}')

    local response
    response=$(curl -s http://localhost:11434/api/generate -d "$json_payload" | jq -r '.response')

    if [ -z "$response" ]; then
        log "error" "Nessuna risposta da Ollama"
        return 1
    fi

    # Salva e pulisci la risposta
    echo "$response" > "$temp_file"

    # Gestisci diversi formati di risposta
    if grep -q "^<?php" "$temp_file"; then
        sed -n '/^<?php/,$p' "$temp_file" > "${temp_file}.clean"
    elif grep -q "^return \[" "$temp_file"; then
        (echo "<?php"; echo ""; grep -A 1000000 "^return \[" "$temp_file") > "${temp_file}.clean"
    elif grep -q '```' "$temp_file"; then
        sed -n '/```/,/```/p' "$temp_file" | sed '1d;$d' > "${temp_file}.clean"
    else
        cat "$temp_file" > "${temp_file}.clean"
    fi

    # Verifica risultato
    if [ ! -s "${temp_file}.clean" ]; then
        log "error" "File risultante vuoto"
        return 1
    fi

    mv "${temp_file}.clean" "$file"
    log "success" "File corretto con AI. Backup in ${file}.backup"
}

# Funzione per pulire un file manualmente
clean_file_manual() {
    local file="$1"
    log "info" "Pulizia manuale di $file"

    # Backup
    cp "$file" "${file}.backup"

    # Rimuovi marcatori di conflitto
    sed -i -e '/^<<<<<<< /d' \
           -e '/^=======/d' \
           -e '/^>>>>>>> /d' "$file"

    # Rimuovi righe vuote multiple
    sed -i '/^$/N;/^\n$/D' "$file"

    log "success" "File pulito manualmente"
}

# Funzione principale
main() {
    # Parsing argomenti
    while [[ $# -gt 0 ]]; do
        case $1 in
            --no-ai)
                USE_AI=false
                shift
                ;;
            --ai)
                USE_AI=true
                shift
                ;;
            *)
                break
                ;;
        esac
    done

    # Verifica prerequisiti AI se necessario
    if [ "$USE_AI" = true ]; then
        check_ai_requirements
    fi

    # Trova file con conflitti
    log "info" "Ricerca file con conflitti..."
    local files_with_conflicts
    files_with_conflicts=$(find . -type f -not -path "*/\.*" \
        -not -path "*/vendor/*" \
        -not -path "*/node_modules/*" \
        -exec grep -l "<<<<<<< " {} \;)

    if [ -z "$files_with_conflicts" ]; then
        log "success" "Nessun conflitto trovato"
        exit 0
    fi

    # Processa ogni file
    echo "$files_with_conflicts" | while read -r file; do
        if [ "$USE_AI" = true ]; then
            if ! clean_file_ai "$file"; then
                log "warning" "Fallback a pulizia manuale per $file"
                clean_file_manual "$file"
            fi
        else
            clean_file_manual "$file"
        fi
    done

    log "success" "Risoluzione conflitti completata"
}

main "$@"
=======

# Script per la risoluzione automatica dei conflitti Git
# Questo script aiuta a identificare e risolvere i conflitti nei file

# Colori per output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# Funzione per il logging
log_info() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

log_warn() {
    echo -e "${YELLOW}[WARN]${NC} $1"
}

log_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Verifica se il file esiste
if [ ! -f "$1" ]; then
    log_error "File non trovato: $1"
    exit 1
fi

file="$1"

# 1. Backup del file originale
cp "$file" "${file}.bak"
log_info "Backup creato: ${file}.bak"

# 2. Rimuovi i marker di conflitto Git se presenti
if grep -q "^<<<<<<< " "$file"; then
    log_info "Rimozione marker di conflitto..."
    sed -i -e '/^<<<<<<< /d' \
           -e '/^=======/d' \
           -e '/^>>>>>>> /d' "$file"
    log_info "Marker di conflitto rimossi"
fi

# 3. Verifica la sintassi del file
if [[ "$file" == *.php ]]; then
    log_info "Verifica sintassi PHP..."
    php -l "$file" > /dev/null
    if [ $? -eq 0 ]; then
        log_info "Sintassi PHP valida"
    else
        log_error "Errori di sintassi PHP trovati"
        exit 1
    fi
fi

# 4. Verifica la formattazione
if [[ "$file" == *.php ]]; then
    log_info "Verifica formattazione PHP..."
    php-cs-fixer fix --dry-run --diff "$file" > /dev/null
    if [ $? -eq 0 ]; then
        log_info "Formattazione PHP valida"
    else
        log_warn "Problemi di formattazione PHP trovati"
    fi
fi

# 5. Verifica i test
if [ -f "phpunit.xml" ]; then
    log_info "Esecuzione test..."
    php artisan test --filter="$(basename "$file")" > /dev/null
    if [ $? -eq 0 ]; then
        log_info "Test passati"
    else
        log_warn "Test falliti"
    fi
fi

log_info "Risoluzione conflitti completata per: $file"

# 6. Trova altri file con conflitti
log_info "Ricerca altri file con conflitti..."
conflict_files=$(find . -type f -not -path "*/\.*" \
    -not -path "*/vendor/*" \
    -not -path "*/node_modules/*" \
    -exec grep -l "<<<<<<< " {} \;)

if [ -n "$conflict_files" ]; then
    log_warn "Altri file con conflitti trovati:"
    echo "$conflict_files"
else
    log_info "Nessun altro file con conflitti trovato"
fi
>>>>>>> 74570873 (.)
