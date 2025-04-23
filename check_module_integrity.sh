#!/bin/bash
# check_module_integrity.sh
# Script per verificare l'integrità dei moduli Laravel
# Uso: ./check_module_integrity.sh [path_laravel]

# Impostazioni predefinite
LARAVEL_PATH=${1:-"/var/www/html/saluteora/laravel"}
MODULES_STATUS_FILE="$LARAVEL_PATH/modules_statuses.json"

# Verifica che il file modules_statuses.json esista
if [ ! -f "$MODULES_STATUS_FILE" ]; then
  echo "ERRORE: File $MODULES_STATUS_FILE non trovato!"
  exit 1
fi

# Verifica che jq sia installato
if ! command -v jq &> /dev/null; then
  echo "ERRORE: jq non è installato. Installalo con 'apt-get install jq'"
  exit 1
fi

# Colori per output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'
NC='\033[0m' # No Color

# Funzione di aiuto per il log
log_success() {
  echo -e "${GREEN}✓ $1${NC}"
}

log_error() {
  echo -e "${RED}✗ $1${NC}"
}

log_warn() {
  echo -e "${YELLOW}! $1${NC}"
}

# Intestazione
echo "================================================"
echo "  Verifica Integrità Moduli Laravel - SaluteOra"
echo "================================================"
echo "Path Laravel: $LARAVEL_PATH"
echo "File stato moduli: $MODULES_STATUS_FILE"
echo "------------------------------------------------"

# Verifica conflitti di merge
echo -e "\n${YELLOW}[1/3] Verificando conflitti di merge non risolti...${NC}"
MERGE_CONFLICTS=$(grep -r "<<<<<<< HEAD" $LARAVEL_PATH | wc -l)
if [ $MERGE_CONFLICTS -gt 0 ]; then
  log_error "Trovati $MERGE_CONFLICTS conflitti di merge non risolti!"
  echo "Prime 5 occorrenze:"
  grep -r "<<<<<<< HEAD" $LARAVEL_PATH | head -n 5
  exit 1
else
  log_success "Nessun conflitto di merge trovato"
fi

# Verifica coerenza stato moduli
echo -e "\n${YELLOW}[2/3] Verificando coerenza stato moduli...${NC}"
ERROR_COUNT=0
MODULE_COUNT=0

for MODULE in $(jq -r 'keys[]' $MODULES_STATUS_FILE); do
  MODULE_COUNT=$((MODULE_COUNT + 1))
  STATUS=$(jq -r ".[\"$MODULE\"]" $MODULES_STATUS_FILE)

  if [ "$STATUS" = "true" ]; then
    # Modulo abilitato, verifica esistenza directory
    if [ ! -d "$LARAVEL_PATH/Modules/$MODULE" ]; then
      log_error "Modulo $MODULE è abilitato ma la directory non esiste!"
      ERROR_COUNT=$((ERROR_COUNT + 1))
      continue
    fi

    # Verifica service provider
    PROVIDER_FILE="$LARAVEL_PATH/Modules/$MODULE/app/Providers/${MODULE}ServiceProvider.php"
    if [ ! -f "$PROVIDER_FILE" ]; then
      log_error "Service provider mancante per il modulo $MODULE! ($PROVIDER_FILE)"
      ERROR_COUNT=$((ERROR_COUNT + 1))
      continue
    fi

    # Verifica namespace
    NAMESPACE_CHECK=$(grep -c "namespace Modules\\\\$MODULE\\\\Providers;" "$PROVIDER_FILE")
    if [ $NAMESPACE_CHECK -eq 0 ]; then
      log_error "Namespace errato nel service provider del modulo $MODULE!"
      ERROR_COUNT=$((ERROR_COUNT + 1))
      continue
    fi

    log_success "Modulo $MODULE: OK"
  else
    # Modulo disabilitato, verifica che esista comunque
    if [ ! -d "$LARAVEL_PATH/Modules/$MODULE" ]; then
      log_warn "Modulo $MODULE è disabilitato e la directory non esiste (potrebbe essere normale)"
    else
      log_success "Modulo $MODULE: Disabilitato"
    fi
  fi
done

# Verifica presenza autoload corretto in composer.json
echo -e "\n${YELLOW}[3/3] Verificando configurazione di composer.json...${NC}"
COMPOSER_FILE="$LARAVEL_PATH/composer.json"

if [ ! -f "$COMPOSER_FILE" ]; then
  log_error "File composer.json non trovato!"
  ERROR_COUNT=$((ERROR_COUNT + 1))
else
  # Verifica che ci sia una configurazione PSR-4 per i moduli
  PSR4_CHECK=$(jq '.autoload["psr-4"] | has("Modules\\\\")' $COMPOSER_FILE)
  if [ "$PSR4_CHECK" = "true" ]; then
    MODULE_PATH=$(jq -r '.autoload["psr-4"]["Modules\\\\"]' $COMPOSER_FILE)
    log_success "Configurazione PSR-4 per i moduli trovata: $MODULE_PATH"
  else
    log_error "Manca la configurazione PSR-4 per i moduli in composer.json!"
    ERROR_COUNT=$((ERROR_COUNT + 1))
  fi
fi

# Riepilogo
echo -e "\n${YELLOW}===================== RIEPILOGO =====================${NC}"
echo "Moduli totali analizzati: $MODULE_COUNT"
if [ $ERROR_COUNT -eq 0 ]; then
  log_success "Tutti i moduli sono configurati correttamente!"
  exit 0
else
  log_error "Trovati $ERROR_COUNT errori nei moduli. Correggili prima di procedere."
  exit 1
fi
