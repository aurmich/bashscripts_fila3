#!/bin/bash
set -euo pipefail

# Modello da utilizzare
MODEL="codellama:7b"
LOG_FILE="git_conflict_resolution.log"

# Funzione di logging
log() {
    local level="$1"
    local message="$2"
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] [$level] $message" | tee -a "$LOG_FILE"
}

# Controlla che i comandi necessari siano installati
check_dependencies() {
    local missing_deps=()
    for cmd in curl jq mktemp php git; do
        if ! command -v "$cmd" >/dev/null 2>&1; then
            missing_deps+=("$cmd")
        fi
    done
    
    if [ ${#missing_deps[@]} -ne 0 ]; then
        log "ERROR" "Comandi mancanti: ${missing_deps[*]}"
        exit 1
    fi
}

# Verifica che Ollama sia in esecuzione
check_ollama() {
    if ! curl -s http://localhost:11434/api/tags >/dev/null 2>&1; then
        log "ERROR" "Ollama non è in esecuzione. Avvia Ollama prima di procedere."
        exit 1
    fi
}

# Verifica che il modello sia disponibile
check_model() {
    if ! curl -s http://localhost:11434/api/tags | jq -e '.models[] | select(.name=="'$MODEL'")' >/dev/null 2>&1; then
        log "ERROR" "Modello $MODEL non trovato. Esegui: ollama pull $MODEL"
        exit 1
    fi
}

# Funzione per correggere il codice PHP
fix_php_code() {
    local file="$1"
    local temp_file
    temp_file=$(mktemp)
    local prompt_file
    prompt_file=$(mktemp)
    
    # Assicura la rimozione dei file temporanei anche in caso di errore
    trap 'rm -f "${temp_file:-}" "${prompt_file:-}"' EXIT
    
    # Verifica se il file ha effettivamente conflitti
    if ! grep -q "<<<<<<< HEAD\|=======\|>>>>>>> " "$file"; then
        log "INFO" "Nessun conflitto trovato in $file"
        return 0
    fi
    
    # Crea una copia di backup del file originale
    cp "$file" "${file}.backup" || {
        log "ERROR" "Impossibile creare backup di $file"
        return 1
    }
    
    # Costruisci un prompt chiaro per il modello
    cat > "$prompt_file" <<EOF
You are an expert PHP developer tasked with fixing and optimizing the following code. Your objective is to:

1. Fix any syntax errors, unresolved merge conflicts, or logical issues
2. Remove git conflict markers (<<<<<<<, =======, >>>>>>>) if present
3. Optimize the code structure and readability without changing functionality
4. Ensure consistency in formatting and naming conventions
5. Apply PHP best practices and modern syntax where appropriate

Return ONLY the corrected and optimized PHP code, without any explanations, comments, or markdown formatting. The code should be complete and ready to use.

Here is the code:

EOF
    
    # Aggiungi il contenuto del file
    cat "$file" >> "$prompt_file"
    
    log "INFO" "Elaborazione del file $file con il modello $MODEL..."
    
    # Prepara il payload JSON per la richiesta all'API di Ollama
    local json_payload
    json_payload=$(jq -n --arg model "$MODEL" --arg prompt "$(cat "$prompt_file")" '{model: $model, prompt: $prompt, stream: false}')
    
    # Richiama l'API di Ollama per ottenere la versione corretta
    local response
    response=$(curl -s http://localhost:11434/api/generate -d "$json_payload" | jq -r '.response')
    
    if [ -z "$response" ]; then
        log "ERROR" "Nessuna risposta da Ollama. Verifica il servizio."
        return 1
    fi
    
    # Salva la risposta in un file temporaneo
    echo "$response" > "$temp_file"
    
    # Pulisci la risposta da eventuali markdown o testo aggiuntivo
    if grep -q "^<?php" "$temp_file"; then
        # Se la risposta inizia con <?php, estrai da lì fino alla fine
        sed -n '/^<?php/,$p' "$temp_file" > "${temp_file}.clean"
    elif grep -q "^return \[" "$temp_file"; then
        # Se la risposta inizia con return [, aggiungi <?php e estrai
        (echo "<?php"; echo ""; grep -A 1000000 "^return \[" "$temp_file") > "${temp_file}.clean"
    elif grep -q '```php' "$temp_file"; then
        # Se c'è un blocco di codice PHP in markdown, estrai solo quel blocco
        sed -n '/```php/,/```/p' "$temp_file" | sed '1d;$d' > "${temp_file}.clean"
    elif grep -q '```' "$temp_file"; then
        # Potrebbe essere un blocco di codice senza specificare php
        sed -n '/```/,/```/p' "$temp_file" | sed '1d;$d' > "${temp_file}.clean"
    else
        # Altrimenti, conserva l'output così com'è ma aggiungi <?php se non presente
        if ! grep -q "<?php" "$temp_file"; then
            (echo "<?php"; echo ""; cat "$temp_file") > "${temp_file}.clean"
        else
            cat "$temp_file" > "${temp_file}.clean"
        fi
    fi
    
    # Verifica che il file risultante sia valido
    if [ ! -s "${temp_file}.clean" ]; then
        log "ERROR" "Il file corretto risulta vuoto. Controlla la risposta dell'API."
        cat "$temp_file" # Mostra la risposta originale per debug
        return 1
    fi
    
    # Verifica la sintassi PHP
    if ! php -l "${temp_file}.clean" >/dev/null 2>&1; then
        log "ERROR" "Il codice generato contiene errori di sintassi PHP"
        return 1
    fi
    
    # Sovrascrive il file originale con la versione corretta
    mv "${temp_file}.clean" "$file"
    
    # Verifica che non ci siano più marker di conflitto
    if grep -q "<<<<<<< HEAD\|=======\|>>>>>>> " "$file"; then
        log "ERROR" "Marker di conflitto ancora presenti dopo la correzione"
        return 1
    fi
    
    log "SUCCESS" "Codice corretto con successo. Backup salvato come ${file}.backup"
    return 0
}

# Funzione principale
main() {
    if [ $# -ne 1 ]; then
        log "ERROR" "Uso: $0 <file_php>"
        exit 1
    fi
    
    local file="$1"
    if [ ! -f "$file" ]; then
        log "ERROR" "Il file $file non esiste."
        exit 1
    fi
    
    check_dependencies
    check_ollama
    check_model
    
    if fix_php_code "$file"; then
        log "SUCCESS" "Operazione completata con successo"
    else
        log "ERROR" "Si sono verificati errori durante la correzione"
        exit 1
    fi
}

main "$@"