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

# ✅ Validazione input
if [ -z "$1" ]; then
    log "error" "Devi specificare il branch come parametro!"
    log "info" "Uso: ./bashscripts/git_up_noai.sh <branch>"
    exit 1
fi

# 📌 Configurazione
me=$(readlink -f -- "$0")
BRANCH="$1"
WHERE=$(pwd)

# 🔄 Aggiornamento submodule
log "info" "Aggiornamento submodule in corso..."
git submodule update --progress --init --recursive --force --merge --rebase --remote || {
    log "error" "Errore nell'aggiornamento submodule"
    exit 1
}
git submodule foreach "$me" "$BRANCH" || {
    log "warning" "Errore nell'aggiornamento ricorsivo submodule"
}

# 🧹 Pulizia file temporanei
log "info" "Pulizia file temporanei..."
find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

# ⚙️ Configurazione git
log "info" "Configurazione git..."
git config core.fileMode false || log "warning" "Impossibile impostare fileMode"
git config advice.submoduleMergeConflict false || log "warning" "Impossibile impostare submoduleMergeConflict"
git config core.ignorecase false || log "warning" "Impossibile impostare ignorecase"

# 💾 Commit modifiche
log "info" "Aggiunta e commit modifiche..."
git add --renormalize -A || log "warning" "Errore nel renormalize"
git add -A && git commit -am "🔄 Aggiornamento automatico" || log "info" "Nessuna modifica da commettere"

# 📤 Push modifiche
log "info" "Push del branch $BRANCH..."
if ! git push origin "$BRANCH" -u --progress 'origin'; then
    log "warning" "Push fallito, tentativo con set-upstream"
    git push --set-upstream origin "$BRANCH" || {
        log "error" "Errore nel push"
        exit 1
    }
fi

# 🔄 Rebase
log "info" "Rebase in corso..."
git rebase --continue || log "info" "Nessun rebase da continuare"

# 🔀 Checkout e aggiornamento branch
log "info" "Checkout e aggiornamento branch $BRANCH..."
git checkout "$BRANCH" -- || { log "error" "Errore nel checkout"; exit 1; }
git branch --set-upstream-to="origin/$BRANCH" "$BRANCH" || log "warning" "Impossibile impostare upstream"
git branch -u "origin/$BRANCH" || log "warning" "Impossibile impostare tracking"
git merge "$BRANCH" || log "warning" "Errore nel merge"

log "success" "Push completato in $WHERE ($BRANCH)"

# 📥 Pull finale
log "info" "Aggiornamento finale..."
git submodule update --progress --init --recursive --force --merge --rebase --remote || {
    log "error" "Errore nell'aggiornamento finale submodule"
    exit 1
}
git checkout "$BRANCH" -- || { log "error" "Errore nel checkout finale"; exit 1; }
git pull origin "$BRANCH" --autostash --recurse-submodules --allow-unrelated-histories --prune --progress -v --rebase || {
    log "error" "Errore nel pull finale"
    exit 1
}

# 🧹 Normalizzazione script
sed -i -e 's/\r$//' "$me" || log "warning" "Impossibile normalizzare lo script"

log "success" "Pull completato in $WHERE ($BRANCH)"

