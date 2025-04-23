#!/bin/bash
<<<<<<< HEAD
# fix_merge_conflicts.sh
# Script per risolvere automaticamente i conflitti di merge nel progetto SaluteOra
# Uso: ./fix_merge_conflicts.sh [path_laravel]

# Impostazioni predefinite
LARAVEL_PATH=${1:-"/var/www/html/saluteora/laravel"}
LOG_FILE="/var/www/html/saluteora/conflict_resolution.log"

# Colori per output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Directory per i backup
BACKUP_DIR="$LARAVEL_PATH/storage/backup/conflicts"

# Crea directory di backup se non esiste
mkdir -p "$BACKUP_DIR"

# Funzione di aiuto per il log
log() {
  echo -e "${YELLOW}$(date '+%Y-%m-%d %H:%M:%S') - $1${NC}" | tee -a "$LOG_FILE"
}

log_success() {
  echo -e "${GREEN}$(date '+%Y-%m-%d %H:%M:%S') - ✓ $1${NC}" | tee -a "$LOG_FILE"
}

log_error() {
  echo -e "${RED}$(date '+%Y-%m-%d %H:%M:%S') - ✗ $1${NC}" | tee -a "$LOG_FILE"
}

# Intestazione
echo "================================================" | tee -a "$LOG_FILE"
echo "  Risoluzione Automatica Conflitti di Merge" | tee -a "$LOG_FILE"
echo "================================================" | tee -a "$LOG_FILE"
echo "Path Laravel: $LARAVEL_PATH" | tee -a "$LOG_FILE"
echo "Log file: $LOG_FILE" | tee -a "$LOG_FILE"
echo "------------------------------------------------" | tee -a "$LOG_FILE"

# Funzione per il backup di un file
backup_file() {
    local file="$1"
    local timestamp=$(date +%Y%m%d%H%M%S)
    local module=$(echo "$file" | grep -o "Modules/[^/]*" | cut -d'/' -f2 || echo "root")
    local backup_path="$BACKUP_DIR/${module}_$(basename "$file").${timestamp}.backup"

    cp "$file" "$backup_path"
    echo -e "${YELLOW}Backup creato: $backup_path${NC}"
}

# Conta i conflitti
MERGE_CONFLICTS=$(grep -r --include="*.php" "<<<<<<< HEAD" "$LARAVEL_PATH" | wc -l)
echo -e "${BLUE}Trovati $MERGE_CONFLICTS file PHP con conflitti di merge.${NC}"

# Se non ci sono conflitti, esci
if [ $MERGE_CONFLICTS -eq 0 ]; then
    echo -e "${GREEN}Non ci sono conflitti di merge da risolvere.${NC}"
    exit 0
fi

# Trova tutti i file con conflitti
CONFLICT_FILES=$(grep -r --include="*.php" -l "<<<<<<< HEAD" "$LARAVEL_PATH")

# Statistiche
total_files=$(echo "$CONFLICT_FILES" | wc -l)
resolved_files=0
failed_files=0

# Per ogni file con conflitti
for file in $CONFLICT_FILES; do
    echo -e "\n${BLUE}Analisi del file: $file${NC}"

    # Crea backup
    backup_file "$file"

    # Determina la strategia di risoluzione (semplice: prendi versione HEAD)
    tmp_file=$(mktemp)

    # Estrai la versione HEAD (tra <<<<<<< HEAD e =======)
    sed '/^<<<<<<< HEAD$/,/^=======$/!d;//d' "$file" > "$tmp_file"

    # Conta quanti blocchi sono stati estratti
    blocks=$(grep -c '.' "$tmp_file")

    if [ $blocks -gt 0 ]; then
        # Applica la risoluzione
        sed -i '/^<<<<<<< HEAD$/,/^>>>>>>> .*$/c\\' "$file"
        cat "$tmp_file" >> "$file"

        # Verifica se ci sono ancora conflitti
        if grep -q "<<<<<<< HEAD\|=======\|>>>>>>> " "$file"; then
            echo -e "${RED}Risoluzione automatica fallita per $file${NC}"
            echo -e "${YELLOW}Ci sono conflitti complessi che richiedono risoluzione manuale.${NC}"
            failed_files=$((failed_files + 1))
        else
            echo -e "${GREEN}Risoluzione automatica completata per $file${NC}"
            resolved_files=$((resolved_files + 1))

            # Verifica la sintassi PHP
            if php -l "$file" > /dev/null 2>&1; then
                echo -e "${GREEN}Verifica sintassi PHP completata con successo.${NC}"
            else
                echo -e "${RED}Errore di sintassi PHP nel file risolto!${NC}"
                echo -e "${YELLOW}Ripristino del backup...${NC}"
                cp "$BACKUP_DIR/$(basename "$file").backup" "$file"
                failed_files=$((failed_files + 1))
                resolved_files=$((resolved_files - 1))
            fi
        fi
    else
        echo -e "${RED}Non è stato possibile identificare blocchi da risolvere.${NC}"
        failed_files=$((failed_files + 1))
    fi

    # Pulizia
    rm "$tmp_file"
done

# Report finale
echo -e "\n${BLUE}===== Rapporto di Risoluzione dei Conflitti =====${NC}"
echo -e "${BLUE}File analizzati: $total_files${NC}"
echo -e "${GREEN}File risolti automaticamente: $resolved_files${NC}"
echo -e "${RED}File che richiedono risoluzione manuale: $failed_files${NC}"

if [ $failed_files -gt 0 ]; then
    echo -e "\n${YELLOW}Alcuni file richiedono risoluzione manuale. Controlla la directory di backup:${NC}"
    echo -e "${YELLOW}$BACKUP_DIR${NC}"
    exit 1
else
    echo -e "\n${GREEN}Tutti i conflitti sono stati risolti con successo!${NC}"

    # Esegui PHPStan per verificare che non ci siano errori
    echo -e "\n${BLUE}Esecuzione di PHPStan per verifica...${NC}"
    cd "$LARAVEL_PATH" && ./vendor/bin/phpstan analyse --level=5 .

    exit 0
fi
=======

# Includi le librerie necessarie
source ./bashscripts/lib/custom.sh
source ./bashscripts/lib/logging.sh

# Funzione per pulire un singolo file
clean_file() {
    local file="$1"
    log "Pulizia file: $file"
    
    # Rimuovi i marcatori di conflitto
    sed -i -e '/^$/d' \
           -e '/^$/d' \
           -e '/^>>>>>>> .*$/d' \
           "$file"
    
    # Rimuovi righe vuote multiple
    sed -i '/^$/N;/^\n$/D' "$file"
    
    log "✅ File pulito: $file"
}

# Trova tutti i file con conflitti
log "Ricerca file con conflitti di merge..."
files_with_conflicts=$(find . -type f -not -path "*/\.*" \
    -not -path "*/vendor/*" \
    -not -path "*/node_modules/*" \
    -exec grep -l "" {} \;)

# Pulisci ogni file
for file in $files_with_conflicts; do
    clean_file "$file"
done

log "✅ Pulizia completata"
log "File puliti: $(echo "$files_with_conflicts" | wc -l)" 
>>>>>>> aurmich/dev
