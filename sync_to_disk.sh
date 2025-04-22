#!/bin/bash

# ✅ Controllo se è stato passato il nome del disco
if [ -z "$1" ]; then
    echo "⚠️ Errore: specificare il nome del disco!"
    echo "👉 Uso: $0 <nome_disco>"
    exit 1
fi

DISK_NAME="$1"
DEST_PATH="/mnt/$DISK_NAME$PWD"

echo "🚀 Avvio sincronizzazione: $PWD → $DEST_PATH"

# 🧹 Pulizia file temporanei inutili (*:Zone.Identifier)
echo "🧹 Pulizia file temporanei..."
find . -type f -name "*:Zone.Identifier" -delete

# 🚀 Sincronizzazione con rsync
echo "📤 Sincronizzazione in corso..."
rsync -avz --relative \
    --exclude='.git' \
    --exclude='build' \
    --exclude='cache' \
    --exclude='storage' \
    --exclude='venv' \
    --exclude='node_modules' \
    --exclude='vendor' \
    --exclude='*.log' \
    --exclude='*.tmp' \
    --exclude='*.bak' \
    --exclude='*.swp' \
    --exclude='*.DS_Store' \
    --exclude='public_html' \
    --exclude='*.phar' \
    --exclude='img' \
    --exclude='*.cache' \
    --exclude='.git-rewrite' \
    --exclude='svg' \
    --exclude='package-lock.json' \
    --exclude='*.lock' \
    --exclude='stubs' \
    ./ "$DEST_PATH" || { echo "❌ Errore durante la sincronizzazione"; exit 1; }

# 🛠️ Normalizzazione dello script stesso
me=$(readlink -f -- "$0")
sed -i -e 's/\r$//' "$me"

echo "✅ Sincronizzazione completata con successo!"
