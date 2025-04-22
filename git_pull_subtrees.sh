#!/bin/bash

# 🎨 Colori per il logging
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# 📝 Funzione di logging
log() {
    local level="$1"
    local message="$2"
    case "$level" in
        "error") echo -e "${RED}❌ $message${NC}" ;;
        "success") echo -e "${GREEN}✅ $message${NC}" ;;
        "warning") echo -e "${YELLOW}⚠️ $message${NC}" ;;
        "info") echo -e "ℹ️ $message" ;;
    esac
}

# 🚀 Importa funzioni di utilità
source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# 📌 Configurazione
me=$(readlink -f -- "$0")
script_dir=$(dirname "$me")
ORG="$1"

# 🔄 Backup su disco
log "info" "Esecuzione backup su disco..."
if ! ./bashscripts/sync_to_disk.sh d; then
    log "error" "Backup fallito"
    exit 1
fi

# ⚙️ Configurazione git
log "info" "Configurazione git..."
git config core.ignorecase false || log "warning" "Impossibile impostare ignorecase"
git config core.fileMode false || log "warning" "Impossibile impostare fileMode"

# 📋 Parsing gitmodules
log "info" "Parsing gitmodules..."
parse_gitmodules gitmodules.ini || {
    log "error" "Errore nel parsing dei gitmodules"
    exit 1
}

# 🔄 Processo subtree
total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    
    log "info" "Processo subtree $i"
    log "info" "📁 Path: $path"
    log "info" "🌐 URL: $url"
    
    # 🔄 Riscrittura URL se ORG è specificato
    if [ -n "$ORG" ]; then
        log "info" "Riscrittura URL per ORG: $ORG"
        url_org=$(rewrite_url "$url" "$ORG") || {
            log "error" "Errore nella riscrittura URL"
            continue
        }
        
        script="$script_dir/git_push_subtree_org.sh"
        chmod +x "$script" || log "warning" "Impossibile impostare permessi script ORG"
        sed -i -e 's/\r$//' "$script" || log "warning" "Impossibile normalizzare script ORG"
        
        if ! "$script" "$path" "$url_org" "$BRANCH"; then
            log "warning" "Push ORG fallita per $path"
        fi
    fi
    
    # 📥 Pull subtree
    script="$script_dir/git_pull_subtree.sh"
    chmod +x "$script" || log "warning" "Impossibile impostare permessi script pull"
    sed -i -e 's/\r$//' "$script" || log "warning" "Impossibile normalizzare script pull"
    
    log "info" "Pull modulo: $path"
    if ! "$script" "$path" "$url"; then
        log "warning" "Pull fallita per $path"
    fi
    
    log "info" "----------------------------------------"
done

log "success" "Processo completato con successo!"
