#!/bin/bash

# ✅ Controllo se è stato passato il nome del disco
if [ -z "$1" ]; then
    echo "⚠️ Errore: specificare il nome del disco!"
    echo "👉 Uso: $0 <nome_disco>"
<<<<<<< HEAD
<<<<<<< HEAD
# Verifica se è stato passato il nome del disco
if [ -z "$1" ]; then
    echo "Uso: $0 <nome_disco>"
=======
>>>>>>> d516087e (.)
=======
# Verifica se è stato passato il nome del disco
if [ -z "$1" ]; then
    echo "Uso: $0 <nome_disco>"
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
    exit 1
fi

DISK_NAME=$1
TIMESTAMP=$(date +"%Y%m%d-%H%M")  # Formato YYYYMMDD-HHMM
ARCHIVE_NAME="$(basename "$PWD")_$TIMESTAMP.tar.gz"

# 📌 Percorsi di destinazione
TEMP_PATH="/tmp/$ARCHIVE_NAME"
DEST_PATH="/mnt/$DISK_NAME/var/www/html/_bases/$ARCHIVE_NAME"

echo "🚀 Avvio sincronizzazione: $PWD → $DEST_PATH"

<<<<<<< HEAD
<<<<<<< HEAD
# 🧹 Rimuove i file temporanei (*:Zone.Identifier)
=======
# 🗑️ Rimuove i file inutili (*:Zone.Identifier)
>>>>>>> d516087e (.)
=======
# 🧹 Rimuove i file temporanei (*:Zone.Identifier)
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
echo "🧹 Pulizia file temporanei..."
find . -type f -name "*:Zone.Identifier" -delete

# 📦 Creazione dell'archivio tar.gz con massima compressione
echo "📝 Creazione dell'archivio: $TEMP_PATH"
tar -czf "$TEMP_PATH" --exclude='.git' --exclude='build' --exclude='cache' --exclude='storage' \
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
    --exclude='venv' --exclude='node_modules' --exclude='*.log' --exclude='*.tmp' \
    --exclude='*.bak' --exclude='*.swp' --exclude='*.DS_Store' --exclude='vendor' \
    --exclude='public_html' --exclude='*.phar' --exclude='img' --exclude='*.cache' \
    --exclude='.git-rewrite'  --exclude='svg' --exclude='package-lock.json' \
    --exclude='*.lock' \
    --warning=no-file-changed "$PWD"

# 🚀 Spostamento dell'archivio sul disco di destinazione
echo "📤 Trasferimento dell'archivio a $DEST_PATH"
mv "$TEMP_PATH" "$DEST_PATH"

# ✅ Conferma
if [ $? -eq 0 ]; then
    echo "✅ Archivio creato e trasferito con successo: $DEST_PATH"
else
    echo "⚠️ Errore durante il trasferimento dell'archivio."
    exit 1
fi
DEST_PATH="/mnt/$DISK_NAME$PWD"
me=$( readlink -f -- "$0";)

echo "Sincronizzazione in corso da '$PWD' a '$DEST_PATH'..."
find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
rsync -avz --relative --exclude='.git' --exclude='build' --exclude='cache'  --exclude='storage' --exclude='venv' --exclude='node_modules' --exclude='vendor' --exclude='stubs' ./ "$DEST_PATH"
sed -i -e 's/\r$//' "$me"
echo "Sincronizzazione completata!"
<<<<<<< HEAD
=======
    --exclude='venv' --exclude='node_modules' --exclude='v
>>>>>>> d516087e (.)
=======
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
