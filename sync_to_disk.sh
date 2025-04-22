#!/bin/bash

# ✅ Controllo se è stato passato il nome del disco
if [ -z "$1" ]; then
    echo "⚠️ Errore: specificare il nome del disco!"
    echo "👉 Uso: $0 <nome_disco>"
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
    exit 1
fi

DISK_NAME="$1"
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
# Verifica se è stato passato il nome del disco
if [ -z "$1" ]; then
    echo "Uso: $0 <nome_disco>"
>>>>>>> origin/dev
>>>>>>> origin/dev
    exit 1
fi

<<<<<<< HEAD
DISK_NAME="$1"
=======
DISK_NAME=$1
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> 84b3813e50c4cbfe71b6ec59f9d5305384b70fb9
TIMESTAMP=$(date +"%Y%m%d-%H%M")  # Formato YYYYMMDD-HHMM
ARCHIVE_NAME="$(basename "$PWD")_$TIMESTAMP.tar.gz"

# 📌 Percorsi di destinazione
TEMP_PATH="/tmp/$ARCHIVE_NAME"
DEST_PATH="/mnt/$DISK_NAME/var/www/html/_bases/$ARCHIVE_NAME"

echo "🚀 Avvio sincronizzazione: $PWD → $DEST_PATH"

<<<<<<< HEAD
# 🧹 Pulizia file temporanei inutili (*:Zone.Identifier)
=======
<<<<<<< HEAD
# 🧹 Pulizia file temporanei inutili (*:Zone.Identifier)
=======
<<<<<<< HEAD
# 🧹 Pulizia file temporanei inutili (*:Zone.Identifier)
=======
<<<<<<< HEAD
# 🧹 Pulizia file temporanei inutili (*:Zone.Identifier)
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
# 🗑️ Rimuove i file inutili (*:Zone.Identifier)
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
echo "🧹 Pulizia file temporanei..."
find . -type f -name "*:Zone.Identifier" -delete

# 📦 Creazione dell'archivio tar.gz con esclusioni
echo "📝 Creazione dell'archivio: $TEMP_PATH"
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
tar -czf "$TEMP_PATH" \
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
    --warning=no-file-changed \
    . || { echo "❌ Errore nella creazione dell'archivio"; exit 1; }

# 📁 Copia dell'archivio sul disco
echo "📤 Trasferimento dell'archivio a $DEST_PATH"
cp "$TEMP_PATH" "$DEST_PATH" || { echo "❌ Errore durante la copia"; exit 1; }

=======
>>>>>>> origin/dev
    . || { echo "❌ Errore nella creazione dell'archivio"; exit 1; }

# 📁 Copia dell’archivio sul disco
echo "📤 Trasferimento dell'archivio a $DEST_PATH"
cp "$TEMP_PATH" "$DEST_PATH" || { echo "❌ Errore durante la copia"; exit 1; }

echo "✅ Archivio creato e trasferito con successo: $DEST_PATH"

# 🛠️ Normalizzazione dello script stesso (opzionale)
me=$(readlink -f -- "$0")
sed -i -e 's/\r$//' "$me"

<<<<<<< HEAD
echo "✅ Sincronizzazione completata!"
=======
echo "✅ Sincronizzazione completata!"
=======
tar -czf "$TEMP_PATH" --exclude='.git' --exclude='build' --exclude='cache' --exclude='storage' \
    --exclude='venv' --exclude='node_modules' --exclude='vendor' .

# 📂 Copia dell’archivio sul disco
echo "📁 Copia dell’archivio su: $DEST_PATH"
cp "$TEMP_PATH" "$DEST_PATH" || { echo "❌ Errore durante la copia"; exit 1; }

echo "✅ Sincronizzazione completata con successo!"
<<<<<<< HEAD
=======
=======
# 🧹 Rimuove i file temporanei (*:Zone.Identifier)
>>>>>>> 84b3813e50c4cbfe71b6ec59f9d5305384b70fb9
echo "🧹 Pulizia file temporanei..."
find . -type f -name "*:Zone.Identifier" -delete

# 📦 Creazione dell'archivio tar.gz con esclusioni
echo "📝 Creazione dell'archivio: $TEMP_PATH"
<<<<<<< HEAD
tar -czf "$TEMP_PATH" \
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
    . || { echo "❌ Errore nella creazione dell'archivio"; exit 1; }

# 📁 Copia dell’archivio sul disco
echo "📤 Trasferimento dell'archivio a $DEST_PATH"
cp "$TEMP_PATH" "$DEST_PATH" || { echo "❌ Errore durante la copia"; exit 1; }

echo "✅ Archivio creato e trasferito con successo: $DEST_PATH"

# 🛠️ Normalizzazione dello script stesso (opzionale)
=======
tar -czf "$TEMP_PATH" --exclude='.git' --exclude='build' --exclude='cache' --exclude='storage' \
    --exclude='venv' --exclude='node_modules' --exclude='*.log' --exclude='*.tmp' \
    --exclude='*.bak' --exclude='*.swp' --exclude='*.DS_Store' --exclude='vendor' \
    --exclude='public_html' --exclude='*.phar' --exclude='img' --exclude='*.cache' \
    --exclude='.git-rewrite'  --exclude='svg' --exclude='package-lock.json' \
    --exclude='*.lock' \
    --warning=no-file-changed "$PWD"

# 🚀 Spostamento dell'archivio sul disco di destinazione
echo "📤 Trasferimento dell'archivio a $DEST_PATH"
mv "$TEMP_PATH" "$DEST_PATH"

>>>>>>> origin/dev
# ✅ Conferma
if [ $? -eq 0 ]; then
    echo "✅ Archivio creato e trasferito con successo: $DEST_PATH"
else
    echo "⚠️ Errore durante il trasferimento dell'archivio."
    exit 1
fi
<<<<<<< HEAD

# 🛠️ Normalizzazione dello script stesso
>>>>>>> 84b3813e50c4cbfe71b6ec59f9d5305384b70fb9
me=$(readlink -f -- "$0")
sed -i -e 's/\r$//' "$me"

echo "✅ Sincronizzazione completata!"
<<<<<<< HEAD
=======
=======
DEST_PATH="/mnt/$DISK_NAME$PWD"
me=$( readlink -f -- "$0";)

echo "Sincronizzazione in corso da '$PWD' a '$DEST_PATH'..."
find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
rsync -avz --relative --exclude='.git' --exclude='build' --exclude='cache'  --exclude='storage' --exclude='venv' --exclude='node_modules' --exclude='vendor' --exclude='stubs' ./ "$DEST_PATH"
sed -i -e 's/\r$//' "$me"
echo "Sincronizzazione completata!"
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> 84b3813e50c4cbfe71b6ec59f9d5305384b70fb9
